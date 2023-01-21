<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Validator;

class FeedbackController extends Controller
{
    public function index()
    {
        //
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'feedback' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        
        Feedback::create([
            'user_id' => auth()->user()->id,
            'appointment_id' => $request->input('appointment_id'),
            'feedback' => $request->input('feedback'),
            'stars' => $request->input('total_stars'),
        ]);

        return response()->json(['success' => 'Feedback successfully created.']);
    }

   
    public function edit(Feedback $feedback)
    {
        //
    }

    public function update(Request $request, Feedback $feedback)
    {
        //
    }

   
    public function destroy(Feedback $feedback)
    {
        //
    }
}
