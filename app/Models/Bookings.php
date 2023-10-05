<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'id',
        'idUser',
        'nameUser',
        'idRoom',
        'phone',
        'emailUser',
        'checkIn',
        'checkOut',
        'total'
    ];

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'idRoom', 'id');
    }
}
