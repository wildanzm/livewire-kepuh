<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
        public function user()
    {
        return view('dashboard'); // Tampilan Dashboard User
    }
}