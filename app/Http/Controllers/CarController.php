<?php

namespace App\Http\Controllers;

use App\Models\car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allcars = car::all();
        foreach ($allcars as $car){
            echo $car;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.import');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $newCar = $req->validate([
            'brand' => 'required | min:3 | max:30',
            'model' => 'required | min:3 | max:30',
            'price' => 'required | integer | gt:0'
        ],[
            'brand.required' => ':attribute jest wymagany',
            'model.required' => ':attribute jest wymagany',
            'price.required' => ':attribute jest wymagany',
            'brand.min' => ':attribute musi być dłuższy od 3',
            'model.min' => ':attribute musi być dłuższy od 3',
            'price.integer' => ':attribute musi być typu całkowitego',
            'price.gt' => ':attribute musi być większy od 0'
        ]);
        $newCar = new car();
        $newCar->brand = $req['brand'];
        $newCar->model = $req['model'];
        $newCar->price = $req['price'];
        $newCar->save();
        return redirect()->route('car.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(car $car)
    {
        //
    }
}
