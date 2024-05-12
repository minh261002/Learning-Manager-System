<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }

    public function ward()
    {
        return $this->hasMany(Ward::class, 'district_code', 'code');
    }

    public function getByProvince($provinceCode)
    {
        return District::where('province_code', $provinceCode)->get();
    }
}