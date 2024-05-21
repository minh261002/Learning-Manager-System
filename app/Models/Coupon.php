<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function getAllCoupons()
    {
        return $this->latest()->get();
    }

    function getCouponsByInstructor_id($instructor_id)
    {
        return $this->where('instructor_id', $instructor_id)->latest()->get();
    }
}
