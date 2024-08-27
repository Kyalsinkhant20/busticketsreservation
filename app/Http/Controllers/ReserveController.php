<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Reserve;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reserves = Reserve::paginate(10);
        $buses = Bus::all();

        return view('reserves.index', compact('reserves', 'buses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buses = Bus::all();
        $name = session('name', '');
        $phoneno = session('phoneno', '');
        $seat = session('seat', '');
        $gender = session('gender', '');
        $bus_id = session('bus_id', '');

        return view('reserves.create', compact('buses', 'name', 'phoneno', 'seat', 'gender', 'bus_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $request->toArray();
        $request->validate([
            'name' => 'required|string|max:255',
            'phoneno' => 'required|string|max:15',
            'seat' => 'required|integer|min:1',
            'gender' => 'required|string',
            'bus_id' => 'required|integer|exists:buses,id',
            'selectedseat' => 'required|string', 
        ]);

       
        $selectedSeats = explode(',', $request->selectedseat);


        foreach ($selectedSeats as $selectedseat) {
            $existingTicket = Reserve::where('bus_id', $request->bus_id)
                                    ->where('selectedseat', $selectedseat)
                                    ->first();

            if ($existingTicket) {
                return redirect()->back()->with('error', "Seat $selectedseat is already booked.");
            }
        }

        // Create reservations for each selected seat
        foreach ($selectedSeats as $selectedseat) {
            $reserve = new Reserve();

            $reserve->name = $request->name;
            $reserve->phoneno = $request->phoneno;
            $reserve->seat = $request->seat;
            $reserve->gender = $request->gender;
            $reserve->bus_id = $request->bus_id;
            $reserve->selectedseat = $selectedseat; // Store each seat individually
            $reserve->save();
        }

        // Redirect with success message
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

        return view('reserves.show', compact('reserve', 'bus', 'location', 'totalAmount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reserve = Reserve::findOrFail($id);
        $buses = Bus::all();
        return view('reserves.edit', compact('reserve', 'buses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phoneno' => 'required|string|max:15',
            'seat' => 'required|integer|min:1',
            'gender' => 'required|string',
            'bus_id' => 'required|integer|exists:buses,id',
            'status' => 'required|string', // Ensure this field is required
        ]);

        $reserve = Reserve::findOrFail($id);
        $reserve->name = $request->input('name');
        $reserve->phoneno = $request->input('phoneno');
        $reserve->seat = $request->input('seat');
        $reserve->gender = $request->input('gender');
        $reserve->bus_id = $request->input('bus_id');
        $reserve->status = $request->input('status');
        $reserve->save();

        return redirect()->route('reserves.index')->with('success', 'Reservation successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserve $reserve)
    {
        $reserve->delete();
        return redirect()->route('reserves.index')->with('success', 'Reservation successfully deleted');
    }

    /**
     * Store session data and show seat selection page.
     */
    public function session(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phoneno' => 'required|string|max:15',
            'seat' => 'required|integer|min:1',
            'gender' => 'required|string',
            'bus_id' => 'required|integer|exists:buses,id',
        ]);

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
