<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use App\Models\Notification;



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
            'symptoms' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        $userid = auth()->user()->id;
        $username = auth()->user()->name;
        
        $onepending = Appointment::where('user_id', $userid)
                                        ->where('status', 'PENDING')
                                        ->get()
                                        ->count();

        $oneDateAndTimeOnly = Appointment::where('status', 'PENDING')
                                        ->where('date', $request->input('date'))
                                        ->where('time', $request->input('time'))
                                        ->get()
                                        ->count();

        if($onepending > 0){
            return response()->json(['onepending' => 'You have already Pending Record, Wait for admin response']);
        }

        if($oneDateAndTimeOnly > 0){
            return response()->json(['oneDateAndTimeOnly' => 'This date and time has been appointed']);
        }
        
        Appointment::create([
            'user_id' => $userid,
            'ref_number' => 'CLINIC-'.substr(time(), 4).auth()->user()->id,
            'note' => $request->input('note'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'symptoms' => $request->input('symptoms'),
        ]);

        Notification::create([
            'user_id' => 1,
            'status' => "Added appointment by " .$username,
            'link' => "/admin/appointment",
        ]);

        return response()->json(['success' => 'Appointment successfully added.']);
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
            'symptoms' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
  
        $userid = auth()->user()->id;
        $username = auth()->user()->name;


        Appointment::find($appointment->id)->update([
            'note' => $request->input('note'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'symptoms' => $request->input('symptoms'),
        ]);
        return response()->json(['success' => 'Appointment updated successfully.']);
    }

    public function destroy(Appointment $appointment)
    {
        Appointment::find($appointment->id)->update([
            'status'        => 'CANCELLED',
        ]);
        return response()->json(['success' => 'Cancelled Successfully.']);



    }
}
