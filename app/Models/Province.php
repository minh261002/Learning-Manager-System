<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function districts()
    {
        return $this->hasMany(District::class, 'province_code', 'code');
    }

    public function getAll()
    {
        return Province::all();
    }
}