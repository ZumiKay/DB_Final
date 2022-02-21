<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Models\subjects;
use App\Models\teachers;
use Illuminate\Http\Request;

class teacherController extends Controller
{
    //
    public function postteacher () {
        $firstname = request('firstname');
        $lastname = request('lastname');
        $phonenumber = request('phonenumber');
        $teacher = new teachers;
        $teacher->first_name = $firstname;
        $teacher->last_name = $lastname;
        $teacher->phoneNumber = $phonenumber;
        $teacher->subject_name = request('subjects');
        $teacher->save();
        return redirect('/home')->with('message' , 'Created teacher');
    }
    public function getTeacher () {
        $teachers = teachers::all();
        $subjects = subjects::all();
        return view('Home' , ['teacher' => $teachers , 'subjects' => $subjects]);
    }
    public function findTeacher ($id) {
        $teacher = teachers::find($id);
        $subject = subjects::all();
        return view('TeacherEdit' , ['teacher' => $teacher , 'subjects' => $subject ]);
    }
    public function updateTeacher ($id) {
        teachers::where('id' , $id)->update([
            "first_name" => \request('first_name'),
            "last_name" => \request('last_name'),
            "phoneNumber" => \request('phoneNumber'),
            "subject_name" => \request('subjects'),
        ]);
        return redirect('/home')->with('message' , 'updated successfully');
    }
    public function createTeacherID () {
        $card = new card();
        $card->cardId = request('cardID');
        $card->name = request('teacherName');
        $card->save();
        return redirect('/teacherID')->with('message' , 'Created Ms/Mr. ID ');
    }
    public function getTeacherID () {
        $card = card::all();
        return view('TeacherCard' , ['cards' => $card]);
    }
    public function deleteTeacherID ($id) {
        card::where('id' , $id)->delete();
        return redirect('/teacherID')->with('message' , 'Deleted Successfully');
    }
    public function deleteTeacher ($id) {
        teachers::where('id' , $id)->delete();
        return redirect('/home')->with('message' , 'Deleted Successfully');
    }


}
