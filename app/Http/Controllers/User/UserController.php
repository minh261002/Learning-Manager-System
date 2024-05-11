<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;

class UserController extends Controller
{
    public $province;
    function __construct()
    {
        $this->province = new Province();
    }
    public function index()
    {
        return view('user.pages.dashboard');
    }

    public function profile()
    {
        $provinces = $this->province->getAll();
        return view('user.pages.profile', compact('provinces'));
    }


}
