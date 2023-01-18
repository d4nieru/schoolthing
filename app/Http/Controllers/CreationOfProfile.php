<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\User;
use App\Models\ClassroomUser;

class CreationOfProfile extends Controller
{
    public function create_profile(Request $request) {
        //return $request->input();

        $request->validate([
            'classroom' => 'required',
            'name' => 'required',
        ]);

        $classroom = new Classroom();
        $classroom->classroom_name = $request->input("classroom");
        $classroom->save();

        $user_id = Auth::id();

        $teacher = User::find($user_id);
        $teacher->name = $request->input("name");
        $teacher->save();

        $classroom_id = $classroom->id;

        $user = User::find($user_id);
        //$user->teachers()->attach([$user_id => ['classroom_id' => $classroom_id, 'teacher_id' => $teacher_id]]);
        $user->classrooms()->attach($classroom_id);

        // $teacher = Teacher::find($teacher_id);
        // $teacher->classrooms()->syncWithoutDetaching($classroom_id);


        return redirect("/home");
    }
}
