<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use App\Models\Notification;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNotification;

class AppointmentController extends Controller
{
   
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            date_default_timezone_set('Asia/Manila');

            $appointments = Appointment::latest()->get();
            return view('admin.appointments', compact('appointments'));
        }
        return abort('403');
    }

    public function store(Request $request)
    {
        
        
    }

    
    public function show(Appointment $appointment)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $appointment]);
        }
    }

  
    public function edit(Appointment $appointment)
    {
        
    }

    public function update(Request $request, Appointment $appointment)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'status' => ['required'],
            'comment' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
    
        Appointment::find($appointment->id)->update([
            'status' => $request->input('status'),
            'comment' => $request->input('comment'),
        ]);

        $emailNotif = [
            'notif_message'     => '',
            'symptoms'           =>  $appointment->symptoms,
            'ref_number'        =>  $appointment->ref_number,
            'date_and_time'     =>  Carbon::parse($appointment->date)->isoFormat('MMM Do YYYY') .'at'. $appointment->time,
            'name'              =>  $appointment->user->name,
            'msg'               =>  $request->input('comment'),
        ];

        $status = $request->input('status');
        if($status == 'PENDING'){
            $message = "Pending";
        }
        if($status == 'APPROVED'){
            
            $message = "Approved";
            $emailNotif['notif_message']  = 'The appointment you requested has been approved.';
            Mail::to($appointment->user->email)
                ->send(new EmailNotification($emailNotif));
        }
        if($status == 'DECLINED'){
            $message = "Declined";

            $emailNotif['notif_message']  = 'The appointment you requested has been declined.';
            Mail::to($appointment->user->email)
                ->send(new EmailNotification($emailNotif));
        }
        if($status == 'FAILED'){
            $message = "Failed";

            $emailNotif['notif_message']  = 'The appointment you requested has been failed.';
            Mail::to($appointment->user->email)
                ->send(new EmailNotification($emailNotif));
        }
        if($status == 'FOLLOW-UP'){
            $message = "Follow-up";

            $emailNotif['notif_message']  = 'The appointment you requested has been follow up.';
            Mail::to($appointment->user->email)
                ->send(new EmailNotification($emailNotif));
        }
        if($status == 'COMPLETED'){
            $message = "Completed";

            $emailNotif['notif_message']  = 'The appointment you requested has been completed.';
            Mail::to($appointment->user->email)
                ->send(new EmailNotification($emailNotif));
        }

        Notification::create([
            'user_id' => $appointment->user_id,
            'status' => "Your Appointment has been " . $message,
            'link' => "/patient/appointment",
        ]);
        

        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return response()->json(['success' => 'Removed Successfully.']);
    }
}
