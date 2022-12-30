<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;

class LandingpageController extends Controller
{
    public function index()
    {
      
        return view('welcome');
    }

   
}
