<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class LandingpageController extends Controller
{
    public function index()
    {
        $feeedbacks = Feedback::latest()->paginate(6);
        return view('welcome', compact('feeedbacks'));
    }

   
}
