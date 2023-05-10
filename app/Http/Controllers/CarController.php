<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->can('admin')){
            $cars=Car::all();
        }else
        {
            $this->authorize('viewAny', Owner::class);

            $cars = Car::whereHas('owner', function ($query) {
                $query->where('agent_id', auth()->user()->id);
            })->get();


        }
        return view('cars.index', ['cars' => $cars]);
    }
   /* public function index(Request $request, Owner $owner)
    {
           if($request->user()->can('admin')){
            view("cars.index",[
                'cars'=>Car::with('owner')->get(),
            ]);
        }else {
            // Authorize the user to view the specified owner's cars
            $this->authorize('viewCars', [$owner]);

            // Retrieve the cars that belong to the specified owner
            $cars = auth()->user()->can('viewCars', [$owner]) ? $owner->cars : null;

            // Return view with cars data
               return view('cars.index', compact('cars'));
        }
    //    return view("cars.index",[
     //      'cars'=>Car::with('owner')->get(),
    //    ]);
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cars.create",[
            'cars'=>Car::with('owner')->get(),
            "owners"=>Owner::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'reg_number'=>'required|digits:6',
            'brand'=>'required|min:2',
            'model'=>'required|min:2'
        ],[
            "reg_number"=>__("Registration number is required and must be 6 digits"),
            "brand"=>__("Brand is required and must be at least 2 characters"),
            "model"=>__("Model must be provided and must have at least 2 characters")
        ]);

        $car=new Car();
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        $car->save();
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car, Image $image, Request $request)
    {
//        $request->validate([
//            'reg_number'=>'required|digits:6',
//            'brand'=>'required|min:2',
//            'model'=>'required|min:2'
//        ],[
//            "reg_number"=>__("Registration number is required and must be 6 digits"),
//            "brand"=>__("Brand is required and must be at least 2 characters"),
//            "model"=>__("Model must be provided and must have at least 2 characters")
//        ]);

        return view("cars.edit",[
            "car" =>$car,
            "images" =>$image->image,
            "owners"=>Owner::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car, Image $image)
    {
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $image->image=$request->image;
        if($request->file("image")!=null) {
            $request->file("image")->store("/public/carsimage");
            $image->image = $request->file('image')->hashName();
        }
        $car->save();
        return redirect()->route("cars.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route("cars.index");
    }
}
