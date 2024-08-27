<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = ['name'];


    // public function reserves(){
    //     return $this->belongsToMany(Reserve::class);
    // }
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
    public static function search($request)
{
    $buses = Bus::query();

    if (isset($request->search)) {
        $buses = $buses->where('busname', 'like', '%'.$request['search'].'%')->orwhere('location', 'like', '%'.$request['search'].'%');
    }

    return $buses->paginate(1);
}
public function reserves()
{
    return $this->hasMany(Reserve::class);
}
}
