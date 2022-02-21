<?php

namespace App\Http\Controllers;

use App\Models\subjects;
use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function createSubject () {
        $subject = new subjects;

        $subject->subject_name = request('subject_name');
        $subject->hours = request('hours');
        $subject->save();

        return redirect('/subjects')->with('message' , 'Created Subjects');
    }
    public function getSubject () {
        $subject = subjects::all();
        return view('SubjectPage' , ['subjects' => $subject]);
    }
    public function findsubject($id){
        $subject = subjects::find($id);

        return view ('subjectEdit' , ['subjects' => $subject]);
    }
    public function updateSubjects ($id) {
        subjects::where('id' , $id)->update(["subject_name" => request('subject_name') , "hours" => \request('hours')] );
        return redirect('/subjects')->with('message' , "Update Successfully");
    }
    public function deleteSubjects ($id){
        subjects::where('id' , $id)->delete();
        return redirect('/subjects')->with('message' , "Deleted");
    }


}
