<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        'id',
        'nameRoom',
        'price',
        'Capacity',
        'roomTypeId',
        'description',
        'image',
        'idHotel'
    ];

    public function typeRoom(){
        return $this->belongsto('App\Models\Typeroom','roomTypeId');
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\Bookings', 'idRoom');
    }
}
