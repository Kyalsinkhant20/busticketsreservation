<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Reserve;
use App\Models\Seat;
use Illuminate\Pagination\Paginator;
class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getData(){
        // return[
        //     ['id'=>1,'date'=>'Jun21,2024','busname'=>'GG-2345|Famous','location'=>'Taunggyi => Yangon','departure'=>'05:00PM','arrival'=>'8:00AM','availability'=>'35','price'=>'25000'],
        //     ['id'=>2,'date'=>'Jun21,2024','busname'=>'GG-1122|JJ Express','location'=>'Mandalay => Yangon','departure'=>'05:00PM','arrival'=>'8:00AM','availability'=>'35','price'=>'20000'],
        //     ['id'=>3,'date'=>'Jun21,2024','busname'=>'AA-4545|Shwe Taung Yoe','location'=>'Taunggyi => Mandalay','departure'=>'05:00PM','arrival'=>'8:00AM','availability'=>'35','price'=>'25000'],
        //     ['id'=>4,'date'=>'Jun21,2024','busname'=>'KK-2345|Doe Nyi Naung','location'=>'Taunggyi => Yangon','departure'=>'05:00PM','arrival'=>'8:00AM','availability'=>'35','price'=>'30000']

        // ];
        // return[];
    }

    public function index()
    {   $buses = Bus::paginate(10);
        return view('buses.index', compact('buses'));    }
    
    public function search(Request $request)
{
    $buses = Bus::search($request->all());
    return view('booking.index', compact('buses'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate(
            [
            'date'=>'required',
            'busname'=>'required',
            'location'=>'required',
            'departure'=>'required',
            'arrival'=>'required',
            'availability'=>'required',
            'price'=>'required',
            'image'=>'required|image|mimes:jpeg,jpg,png,svg,gif|max:2048'
            ]
        );

       $bus = new Bus();
       $bus->date = $request->input('date');
       $bus->busname = $request->input('busname');
       $bus->location = $request->input('location');
       $bus->departure = $request->input('departure');
       $bus->arrival= $request->input('arrival');
       $bus->availability = $request->input('availability');
       $bus->price = $request->input('price');
       $img_name = time().'.'.$request->image->extension();
       $request->image->move(public_path('images'),$img_name);
       $bus->image=$img_name;
       $bus->save();
       
       return redirect()->route('buses.index')->with('success','Successfully Added Bus Route');
       //insert into bus table



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
        {
        // $buses = self::getData();
        // $index= array_search($id,array_column($buses,'id'));
       
        
        // if($index === false){
        //     abort(440);
        // }
        //select * from Bus where id=1
        // $record = Bus::findOrFail($id);
        // return view('buses.show',['bus'=>$record]);
        $bus = Bus::with('seats')->findOrFail($id);
        return view('buses.show', compact('bus'));
        
    }

    /**s
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('buses.edit',['bus'=>Bus::findOrFail($id)]);
        // return view('buses.edit',['bus'=>$bus]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
           
            'date'=>'required',
            'busname'=>'required',
            'location'=>'required',
            'departure'=>'required',
            'arrival'=>'required',
            'availability'=>'required',
            'price'=>'required',
            'image'=>'required|image|mimes:jpeg,jpg,png,svg,gif|max:2048'
            ]
        );
        $bus= Bus::findOrFail($id);
       $bus->date = $request->input('date');
       $bus->busname = $request->input('busname');
       $bus->location = $request->input('location');
       $bus->departure = $request->input('departure');
       $bus->arrival= $request->input('arrival');
       $bus->availability = $request->input('availability');
       $bus->price = $request->input('price');
       $img_name = time().'.'.$request->image->extension();
       $request->image->move(public_path('images'),$img_name);
       $bus->image=$img_name;
       $bus->save();
       return redirect()->route('buses.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        $bus->delete();
        return redirect()->route('buses.index');
    }

    public function bookSeat(Request $request, $seat_id)
    {
        $seat = Seat::findOrFail($seat_id);
        if ($seat->is_booked) {
            return redirect()->back()->with('error', 'Seat already booked.');
        }

        $seat->is_booked = true;
        $seat->save();

        Reserve::create([
            'seat_id' => $seat->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Seat booked successfully.');
    }
    public function showPrice($id) {
        // Assuming $id is the bus ID passed to the method
        $busPrice = Bus::find($id)->price;
    
        // Pass $busPrice to the view
        return view('seats.index', compact('busPrice'));
    }
}

