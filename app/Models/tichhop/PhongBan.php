<?php

namespace App\Models\tichhop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
    use HasFactory;

    protected $table = 'phongban';

    protected $fillable = [
        'MaPhongBan',
        'TenPhongBan',
    ];
}
