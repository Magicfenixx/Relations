<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Owner::class, 'owner');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $searchOwnerName=$request->session()->get('searchOwnerName');
        $searchOwnerSurname=$request->session()->get('searchOwnerSurname');
        if ($searchOwnerName!=null){
            $owners=Owner::where('name','like',"%$searchOwnerName%")->with('cars')->get();
        } else if ($searchOwnerSurname!=null){
        $owners=Owner::where('surname','like',"%$searchOwnerSurname%")->with('cars')->get();
    }else
    {
        $owners=Owner::with('cars')->get();
    }
//        dd("hello");
        // Authorize the user to view any owners
        $this->authorize('viewAny', Owner::class);

        // Retrieve all owners that the user is authorized to view
        if($request->user()->can('admin')){
            $owners=Owner::all();
        }else {
            $owners = auth()->user()->can('viewAny', Owner::class)? Owner::where('agent_id', auth()->user()->id)->get() : null;
        }
        // Return view with owners data
        return view("owners.index",[
            "owners"=>$owners,
            "searchOwnerName"=>$searchOwnerName,
            "searchOwnerSurname"=>$searchOwnerSurname
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("owners.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:2',
            'surname'=>'required|min:2',
        ],[
            "name"=>__("Name is required and must be at least 2 characters"),
            "surname"=>__("Surname is required and must be at least 2 characters"),
        ]);

        $owner=new Owner();
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->save();
        return redirect()->route("owners.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return Response
     */
    public function edit(Owner $owner)
    {
        return view("owners.edit",[
           "owner" =>$owner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return Response
     */
    public function update(Request $request, Owner $owner)
    {
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->save();
        return redirect()->route("owners.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return Response
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route("owners.index");
    }

    public function search(Request $request){
        $request->session()->put('searchOwnerName', $request->name);
        $request->session()->put('searchOwnerSurname', $request->surname);
        return redirect()->route("owners.index");


    }
}
