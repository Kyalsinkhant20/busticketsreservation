<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    
// public function buses(){
    
//     return $this->belongsToMany(Bus::class);
// }
protected $fillable = [
    'name',
    'phoneno',
    'gender',
    'bus_id',
    'selectedSeats',
];

public function seat()
{
    return $this->belongsTo(Seat::class);
}
public function bus()
{
    return $this->belongsTo(Bus::class, 'bus_id');
}

}
