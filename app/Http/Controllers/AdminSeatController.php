<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Seat;

class AdminSeatController extends Controller
{
    public function index()
    {
        $buses = Bus::with('seats')->get();
        return view('admin.seats', compact('buses'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'seats' => 'required|array',
        ]);

        $bus = Bus::find($validated['bus_id']);
        $bus->seats()->delete();

        foreach ($validated['seats'] as $seat) {
            Seat::create([
                'bus_id' => $bus->id,
                'seat_number' => $seat['number'],
                'status' => $seat['status'],
            ]);
        }

        return redirect()->route('admin.seats')->with('success', 'Seats updated successfully!');
    }
}
