<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarsController extends Controller
{
    protected $redirectTo = '/api/cars';

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'year' => 'required|integer|min:4|max:4',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
        ]);
    }

    public function index(): View
    {
        $cars = Car::where('user_id', auth()->user()->id)->get();

        return view('cars.index', ['cars' => $cars]);
    }

    public function create(): View
    {
        return view('cars.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $car = new Car;
        $car->user_id = auth()->user()->id;
        $car->year = $request->year;
        $car->make = $request->make;
        $car->model = $request->model;
        $car->save();

        return redirect()->route('cars.index')->with('success','Car successfully created');
    }

    public function destroy($id): RedirectResponse
    {
        $car = Car::findOrFail($id);

        $car->delete();

        return redirect()->route('cars.index')
            ->with('success', 'Car deleted successfully');
    }

    public function trips($id): View
    {
        $car = Car::with('trips')->findOrFail($id);

        $totalMiles = $car->trips->sum('miles');

        return view('cars.trips', [
            'car' => $car,
            'totalMiles' => $totalMiles
        ]);
    }
}
