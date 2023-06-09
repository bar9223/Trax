<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('make')->nullable(false);
            $table->string('model')->nullable(false);
            $table->integer('year')->nullable(false);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();


        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
