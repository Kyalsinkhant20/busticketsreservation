<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Reserve;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
       
        {
           
            $totalBuses = Bus::count();
            $totalReservations = Reserve::count();
           
            return view('admin.index', compact('totalBuses', 'totalReservations'));
        }
    
        public function seat()
    {
        $seats = Seat::all();
        return view('admin.seats', compact('seats'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'busname' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'departure' => 'required|date',
        'arrival' => 'required|date',
        'availability' => 'required|boolean',
        'price' => 'required|numeric',
    ]);

    $bus = new Bus();
    $bus->date = $request->input('date');
    $bus->busname = $request->input('busname');
    $bus->location = $request->input('location');
    $bus->departure = $request->input('departure');
    $bus->arrival = $request->input('arrival');
    $bus->availability = $request->input('availability');
    $bus->price = $request->input('price');
    $bus->save();

    return redirect()->route('buses.index')->with('success', 'Bus added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show($busId)
    {
        // Fetch booked seats for the bus
        $bookedSeats = Reserve::where('bus_id', $busId)->pluck('seat_number')->toArray();
    
        return view('reserves.show', compact('bookedSeats'));
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
