<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reserves = Reserve::paginate(5);
        return view('reserves.index',['reserves'=>$reserves]);
    }
    public function create()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     */
    public function createuser(array $data)
    {
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'role' => 'user'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
           ['name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
           ] 
        );
        $data=$request->all();
        $check= $this->createuser($data);
        return redirect("login")->with('success','Great! You have successfully login.');
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
