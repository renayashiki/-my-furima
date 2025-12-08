<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    // マイページ
    public function index()
    {
        return view('profile.index');
    }
}
