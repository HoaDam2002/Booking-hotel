<?php

namespace App\Models\tichhop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;

    protected $table = 'chucvu';

    protected $fillable = [
        'MaChucVu',
        'TenChucVu',
        'MaLuong'
    ];

    public function luong()
    {
        return $this->hasOne('App\Models\tichhop\Luong', 'MaLuong','MaLuong');
    }
}
