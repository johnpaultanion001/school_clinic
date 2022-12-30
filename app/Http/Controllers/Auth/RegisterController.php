<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
     
        $user_type      = $data['user_type'];

        if($user_type == 'student'){
            return Validator::make($data,
             [
                'name' => ['required', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'contact_number' => ['required', 'min:8','max:11', 'unique:users'],
                'address' => ['required'],
                'password' => ['required', 'min:8', 'confirmed'],
                'terms_and_conditions' => 'accepted',
                
                'grade_student'   => ['required'],
                'lrn'   => ['required'],
                'student_id'   => ['required'],
            ]);
        }
        if($user_type == 'teacher'){
            return Validator::make($data,
             [
                'name' => ['required', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'contact_number' => ['required', 'min:8','max:11', 'unique:users'],
                'address' => ['required'],
                'password' => ['required', 'min:8', 'confirmed'],
                'terms_and_conditions' => 'accepted',
                'teacher_id'   => ['required'],
            ]);
        }
        if($user_type == 'non_personnel'){
            return Validator::make($data,
             [
                'name' => ['required', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'contact_number' => ['required', 'min:8','max:11', 'unique:users'],
                'address' => ['required'],
                'password' => ['required', 'min:8', 'confirmed'],
                'terms_and_conditions' => 'accepted',
                'non_personnel_id'   => ['required'],
            ]);
        }
    }

 
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'contact_number' => $data['contact_number'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),

            'grade_student' => $data['grade_student'],
            'lrn' => $data['lrn'],
            'student_id' => $data['student_id'],

            'teacher_id' => $data['teacher_id'],

            'non_personnel_id' => $data['non_personnel_id'],

            'role' => $data['user_type'],
        ]);
    }
}
