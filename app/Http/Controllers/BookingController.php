<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bus;
use App\Models\Reserve;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Bus::query();
    
    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('busname', 'LIKE', "%{$search}%")
              ->orWhere('location', 'LIKE', "%{$search}%");
    }

    $buses = $query->paginate(10);
    $busId = $request->query('bus_id');
    $selectedBus = $busId ? Bus::find($busId) : null;
    return view('booking.index', compact('buses', 'selectedBus'));

   
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($reserveId)
{
    $reserve = Reserve::find($reserveId);
    
    if (!$reserve) {
        return redirect()->route('user.index')->with('error', 'Reservation not found');
    }

    $bus = Bus::find($reserve->bus_id);
    
    if (!$bus) {
        return redirect()->route('user.index')->with('error', 'Bus not found');
    }

    $location = $bus->location;
    $pricePerSeat = $bus->price;
    $totalAmount = $reserve->seat * $pricePerSeat;
    
    return view('reserves.show', compact('reserve', 'bus', 'location', 'totalAmount'));
}
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reserve = Reserve::findOrFail($id);
        $buses = Bus::all();
        return view('booking.edit', compact('reserve', 'buses'));
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
