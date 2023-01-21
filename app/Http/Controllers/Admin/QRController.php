<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;

class QRController extends Controller
{
    public function index()
    {
       
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            return view('admin.qr.qr');
        }
        return abort('403');
    }
    public function user_qr(User $user)
    {
        if($user != null){
            $message = 'Record found';
        }
        else{
            $message = 'Record not found';
        }
        $user_data[] = array(
            'id'        => $user->student_id ?? $user->teacher_id ?? $user->non_personnel_id ?? '', 
            'role'        => $user->role ?? '', 
            'name'        => $user->name ?? '', 
            'email'        => $user->email ?? '', 
            'contact_number'        => $user->contact_number ?? '', 
            'address'        => $user->address ?? '', 
            'grade_student'        => $user->grade_student ?? '', 
            'lrn'        => $user->lrn ?? '', 
            'register_at'        => $user->created_at->format('M j , Y h:i A'), 
        );

        foreach($user->appointments()->get() as $app){
            $appointment_data[] = array(
                'id'        => $app->id ?? '', 
                'ref_number'        => $app->ref_number ?? '', 
                'symptoms'          => $app->symptoms ?? '',
                'date_time'        => $app->date .' at '. $app->time, 
                'status'        => $app->status ?? '', 
                'admin_comment'        => $app->comment ?? '', 
                'created_at'        => $app->created_at->format('M j , Y h:i A'), 
                'completed_at'        => $app->updated_at->format('M j , Y h:i A'), 
            );
        }

       

        return response()->json([
            'appointments'  => $appointment_data ?? '',
            'user' => $user_data ?? '',
            'message' => $message,
        ]);
    }

    public function assesement(User $user){
        $apps_graph = Appointment::select(
            \DB::raw("SUM(isAppointment) as appointment"),
            \DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
            \DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
            ->where('user_id',$user->id)
            ->groupby('year','month')
            ->orderBy('year')
            ->get();

        $graph_data = [];
        foreach($apps_graph as $row) {
            $graph_data['label'][] = $row->new_date;
            $graph_data['data'][] =   $row->appointment;
        }

        $data = json_encode($graph_data);
        return view('admin.qr.assestment', compact('data'));
    }
    public $appiontments = [
        [
            'model'      => '\\App\\Models\\Appointment',
            'date_field' => 'date',
            'field'      => 'symptoms',
            'route'      => 'admin.calendar.index',
        ],
    ];
    public function calendar(){
        $events = [];
        foreach ($this->appiontments as $source) {
            $appointments = Appointment::latest()->get();              
            foreach ($appointments as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);

                if (!$crudFieldValue) {
                    continue;
                }
                $events[] = [
                    'title' => 'Name: '.$model->user->name ,
                    'start' => $crudFieldValue, 
                    'url'   => route($source['route']),
                    'backgroundColor' => '#008C1F',
                    'borderColor'    => '#008C1F',
                ];
            }
        }
        

        return view('admin.calendar', compact('events'));
    }
    
}
