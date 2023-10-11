<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'idUser',
        'nameUser',
        'idRoom',
        'phone',
        'emailUser',
        'checkIn',
        'checkOut',
        'total',
        'status',
    ];
}
