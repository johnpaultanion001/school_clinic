<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Notification;
use App\Models\Service;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;



class AppointmentController extends Controller
{
    public function index()
    {
        $userid = auth()->user()->id;
        $appointments = Appointment::where('user_id', $userid)->latest()->get();
        return view('patient.appointments', compact('appointments'));
    }
    
   
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'date' => ['required','after:today', 'date'],
            'time' => ['required'],
            'symtoms' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        $userid = auth()->user()->id;
        $username = auth()->user()->name;
        
        Appointment::create([
            'user_id' => $userid,
            'ref_number' => 'JFMS-'.substr(time(), 4).auth()->user()->id,
            'symtoms' => $request->input('symtoms'),
            'note' => $request->input('note'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);

        Notification::create([
            'user_id' => 1,
            'status' => "Added appointment by " .$username,
            'link' => "/admin/appointment",
        ]);

        return response()->json(['success' => 'Added Successfully.']);
    }
   
    public function edit(Appointment $appointment)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $appointment]);
        }
    }

    
    public function update(Request $request, Appointment $appointment)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'date' => ['required','after:today', 'date'],
            'time' => ['required'],
            'symtoms' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
  
        $userid = auth()->user()->id;
        $username = auth()->user()->name;

        Appointment::find($appointment->id)->update([
            'symtoms' => $request->input('symtoms'),
            'note' => $request->input('note'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);
        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function destroy(Appointment $appointment)
    {
        Appointment::find($appointment->id)->update([
            'status'        => 'CANCELED',
        ]);
        return response()->json(['success' => 'Canceled Successfully.']);



    }

}
