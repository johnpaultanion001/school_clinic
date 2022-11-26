<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use File;

class UserController extends Controller
{
    public function updateshow()
    {
        return view('patient.update_info');

    }
    public function update(Request $request , User $user)
    {
        if($request->type_of_user == 'student'){
            $validated =  Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'contact_number' => ['required', 'min:8','max:11', 'unique:users,contact_number,'.$user->id],
                'address' => ['required'],
                'grade_section'   => ['required'],
                'lrn'   => ['required'],
                'student_id'   => ['required'],
            ]);
        }
        if($request->type_of_user == 'teacher'){
            $validated =  Validator::make($request->all(), [
                'name' => ['required', 'max:255'],
                'contact_number' => ['required', 'min:8','max:11','unique:users,contact_number,'.$user->id],
                'address' => ['required'],
                'teacher_id'   => ['required'],
            ]);
        }
        if($request->type_of_user == 'non_personnel'){
            $validated =  Validator::make($request->all(), [
                'name' => ['required', 'max:255'],
                'contact_number' => ['required', 'min:8','max:11','unique:users,contact_number,'.$user->id],
                'address' => ['required'],
                'non_personnel_id'   => ['required'],
            ]);
        }
        
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        User::find($user->id)->update([
            'name' => $request->input('name'),
            'contact_number' => $request->input('contact_number'),
            'address' => $request->input('address'),

            'grade_section' => $request->input('grade_section'),
            'lrn' => $request->input('lrn'),
            'student_id' => $request->input('student_id'),

            'teacher_id' => $request->input('teacher_id'),

            'non_personnel_id' => $request->input('non_personnel_id'),

            'role' => $request->input('type_of_user'),
        ]);
        
    

        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function changepassword(Request $request , User $user)
    {
        $validated =  Validator::make($request->all(), [
            'current_password' => ['required',new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_password' => ['required','same:new_password'],
           
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        User::find($user->id)->update([
            
            'password' => Hash::make($request->input('new_password')),
          
        ]);
        return response()->json(['success' => 'Updated Successfully.']);
    }
}
