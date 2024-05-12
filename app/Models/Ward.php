<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function district()
    {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }

    public function getByDistrict($districtCode)
    {
        return Ward::where('district_code', $districtCode)->get();
    }

}