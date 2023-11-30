<?php

namespace App\Models\tichhop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhanvien';

    protected $fillable = [
        'MaNhanVien',
        'TenNhanVien',
        'Tuoi',
        'Email',
        'GioLam',
        'MaChucVu',
        'MaPhongBan',
    ];

    public function chucvu()
    {
        return $this->belongsTo('App\Models\tichhop\ChucVu', 'MaChucVu', 'MaChucVu');
    }

    public function phongban()
    {
        return $this->belongsTo('App\Models\tichhop\PhongBan', 'MaPhongBan', 'MaPhongBan');
    }
}
