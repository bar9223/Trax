<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Car;
use App\Trip;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TripsController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        $userId = auth()->user()->id;

        $trips = DB::table('trips')
            ->select('trips.id', 'trips.date', 'trips.miles', 'cars.id as car_id', 'cars.make as car_make', 'cars.model as car_model')
            ->join('cars', 'trips.car_id', '=', 'cars.id')
            ->where('cars.user_id', $userId)
            ->get();

        if ($request->wantsJson()) {
            return response()->json($trips);
        }

        return view('trips.index', ['trips' => $trips]);
    }

    public function create(): View
    {
        $cars = Car::where('user_id', auth()->user()->id)->get();

        return view('trips.create', ['cars' => $cars]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'date' => 'required|date',
            'miles' => 'required|numeric|min:0',
            'car_id' => 'required|exists:cars,id',
        ]);

        $car = Car::where('id', $data['car_id'])
            ->where('user_id', auth()->user()->id)
            ->first();

        if (!$car) {
            return redirect()->back()->withErrors(['car_id' => 'This car does not belong to the authenticated user.']);
        }

        $trip = new Trip;
        $trip->date = $data['date'];
        $trip->miles = $data['miles'];
        $trip->car_id = $data['car_id'];
        $trip->save();

        return redirect()->route('trips.index');
    }

    public function destroy($id): RedirectResponse
    {
        $trip = Trip::find($id);

        if ($trip && $trip->car->user_id == auth()->user()->id) {
            $trip->delete();
        } else {
            return redirect()->back()->withErrors(['trip' => 'This trip does not exist or does not belong to the authenticated user.']);
        }

        return redirect()->route('trips.index');
    }
}
