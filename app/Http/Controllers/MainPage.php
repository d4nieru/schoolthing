<?php

namespace App\Http\Controllers;

use DebugBar\StandardDebugBar;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainPage extends Controller
{
    public function main_home() {
        
        //$user = Auth::user();
        $user_id = Auth::id();

        $users = User::all();
        $classrooms = Classroom::all();

        return view('mainpage', compact('users', 'classrooms', 'user_id'));
    }

    public function show_all_classrooms() {

        $user_id = Auth::id();

        $classrooms = Classroom::all();
        
        return view('create_classroom', compact('classrooms', 'user_id'));
    }

    public function show_all_teachers() {

        $user_id = Auth::id();

        $all_users = User::all();
        
        return view('create_teacher', compact('all_users', 'user_id'));
    }

    public function create_classroom(Request $request) {

        $request->validate([
            'classroom' => 'required'
        ]);

        $user_id = Auth::id();

        $classroom = new Classroom();
        $classroom->classroom_name = $request->input("classroom");
        $classroom->save();

        // $classroom_id = $classroom->id;

        // $user = User::find($user_id);
        // $user->classrooms()->attach($classroom_id);

        return redirect('/classrooms');
    }

    public function delete_classroom($id) {

        $user = User::find($id);

        $user->classrooms()->detach($id);

        return redirect('/teachers');

        // $user_id = Auth::id();

        // $deleteclassroom = User::find($user_id);
        // $classroom = Classroom::find($user_id);

        // echo $id;

        //$deleteclassroom->classrooms()->detach($id);
        //$classroom->delete($id);
        //$user->delete($id); cela supprime l'utilisateur

        //return redirect('/classrooms');
    }

    public function create_teacher(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'seniorTeacher' => 'required'
        ]);

        $isSeniorTeacher = false;
        $senior_teacher = $request->input("seniorTeacher");
        if ($senior_teacher == 'yes') {
            $isSeniorTeacher = true;
        }

        $teacher = new User();
        $teacher->name = $request->input("name");
        $teacher->email = $request->input("email");
        $teacher->password = Hash::make($request->input("password"));
        $teacher->save();

        //$teacher_id = $teacher->id;

        //$user = User::find($user_id);
        //$user->teachers()->attach([$user_id => ['teacher_id' => $teacher_id, 'isSeniorTeacher' => $isSeniorTeacher]]);

        return redirect('/teachers');
    }

    public function delete_entire_classroom($id) {

    }

    public function remove_user_from_classroom($id) {

        // $classrooms = User::all();

        // foreach($classrooms as $classroom) {
        //     foreach($classroom->users as $classr) {
        //         $classr = $classr->id;
        //     }
        // }
        $userr = User::find($id);
        //echo "user : " . $id . "classroom : " . $usern;

        $userr->classrooms()->detach();
    }

}
