<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Reserve;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busId = $request->input('bus_id'); // Get the bus_id from the request

        // Ensure busId is provided
        if (!$busId) {
            return redirect()->back()->with('error', 'Bus ID is required.');
        }

        $seats = Seat::where('bus_id', $busId)->get();
        $bookedSeats = Seat::where('bus_id', $busId)->where('status', 'booked')->pluck('seat_number')->toArray();

        return view('seats.index', compact('seats', 'bookedSeats', 'busId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $busId = $request->input('bus_id');
        $selectedSeats = session('selected_seats', []);

        return view('reserves.create', compact('selectedSeats', 'busId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'phoneno' => 'required|string|max:15',
            'seat' => 'required|integer|min:1',
            'gender' => 'required|string',
            'bus_id' => 'required|integer|exists:buses,id',
            'selectedseat' => 'required|string', // Comma-separated seat numbers
        ]);
    
        // Extract selected seats
        $selectedSeats = explode(',', $request->selectedseat);

        
        // Check if selected seats are available
        foreach ($selectedSeats as $selectedseat) {
            $existingTicket = Reserve::where('bus_id', $request->bus_id)
                                    ->where('selectedseat', $selectedseat)
                                    ->first();

    
                                    if ($existingTicket) {
                                        return redirect()->back()->with('error', "Seat $selectedseat already booked.");
                                    }
    
        // Create a new reservation
        $reserve = new Reserve();
        $reserve->bus_id =$request->trip_id;
        $reserve->name=$request->name;
        $reserve->phoneno=$request->phoneno;
        $reserve->seat=$request->seat;
        $reserve->gender=$request->gender;
        $reserve->selectedseat=$selectedSeats;
        $reserve->save();
    }
        return redirect()->route('reserves.show', ['reserveId' => $reserve->id])
            ->with('success', 'Seats successfully booked.');
    
    }


    
    /**
     * Display the specified resource.
     */
    public function show(string $reserveId)
    {     
        $reserve = Reserve::find($reserveId);
        
        if (!$reserve) {
            return redirect()->route('reserves.index')->with('error', 'Reservation not found');
        }
    
        $bus = Bus::find($reserve->bus_id);
        
        if (!$bus) {
            return redirect()->route('reserves.index')->with('error', 'Bus not found');
        }
    
        $location = $bus->location;
        $pricePerSeat = $bus->price;
        $totalAmount = $reserve->seat * $pricePerSeat;
        
        return view('seat.show', compact('reserve', 'bus', 'location', 'totalAmount'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Implement the edit functionality if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implement the update functionality if needed
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Implement the destroy functionality if needed
    }

    /**
     * Handle the session data and display seat selection.
     */
    public function session(Request $request)
    {
        $name = $request->input('name');
        $phoneno = $request->input('phoneno');
        $seat = $request->input('seat');
        $gender = $request->input('gender');
        $bus_id = $request->input('bus_id');

        // Store session data
        session()->put([
            'name' => $name,
            'phoneno' => $phoneno,
            'seat' => $seat,
            'gender' => $gender,
            'bus_id' => $bus_id,
        ]);

        return view('seats.index', compact('name', 'phoneno', 'seat', 'gender', 'bus_id'));
    }
}
