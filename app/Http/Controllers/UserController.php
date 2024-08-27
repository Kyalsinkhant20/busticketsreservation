<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index');
        
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function about()
    {
        return view('user.about');
    }

    public function viewbus()
    {
        return view('user.viewbus');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bus = new Bus();
        $bus->date = $request->input('date');
        $bus->busname = $request->input('busname');
        $bus->location = $request->input('location');
        $bus->departure = $request->input('departure');
        $bus->arrival= $request->input('arrival');
        $bus->availability = $request->input('availability');
        $bus->price = $request->input('price');
        $bus->save();
        return redirect()->route('buses.index');
        //insert into bus table
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
