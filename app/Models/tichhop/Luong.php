<?php

namespace App\Models\tichhop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    use HasFactory;

    protected $table = 'luong';

    protected $fillable = [
        'MaLuong',
        'SoLuong',
    ];
}
