<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeroom extends Model
{
    use HasFactory;

    protected $table = 'typerooms';

    protected $fillable = [
        'typeName',
    ];

    public function room(){
        return $this->hasMany('App\Models\Room','roomTypeId');
    }
}
