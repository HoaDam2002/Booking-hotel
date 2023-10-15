<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBooking extends Model
{
    use HasFactory;

    protected $table = 'historybooking';

    protected $fillable = [
        'id',
        'idUser',
        'nameUser',
        'idRoom',
        'phone',
        'emailUser',
        'checkIn',
        'checkOut',
        'status',
        'total',
    ];

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'idRoom', 'id');
    }
}
