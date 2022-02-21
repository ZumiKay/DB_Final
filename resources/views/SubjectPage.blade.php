@include('Header')
@section('content')
<h1 style="text-decoration: underline; text-shadow: 3.5px 1px pink">List of Subjects in International HighSchool</h1>

<button type="button" data-bs-toggle="modal" data-bs-target="#addmodal"  class="btn btn-dark">Add New Subjects</button>
<a class="btn btn-dark" href="/teacherID" >View Teacher ID Cards</a>
<a class="btn btn-dark" href="/home"> View All Teacher</a>
<a class="btn btn-dark" href="/">Back To Home</a>
@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif


<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Add New Subjects</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <form method="post" action="/create-subject" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="text" id="subject_name" name="subject_name" placeholder="Subject Name"/>
                        <input type="number" id="hours" name="hours" placeholder="Credits"/>
                        <button type="submit" id="form-btn" class="btn btn-primary">Add Subjects</button>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
<div style="margin-top: 50px">
    <table class="table table-dark table-striped">
        <thead>
            <th>ID</th>
            <th>Subject</th>
            <th>Credits</th>
            <th>Teacher Mr/Ms</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
            <tr class="table-secondary ">
                <td>{{$subject->id}}</td>
                <td>{{$subject->subject_name}}</td>
                <td>{{$subject->hours}}</td>
                <td>{{$subject->teacher->first_name ?? ''}} {{$subject->teacher->last_name ?? ''}}</td>
                <td>
                <a href="/subjects-edit/{{$subject->id}}" class="btn btn-dark"> Edits </a>
                <a href="/deletesubject/{{$subject->id}}}" class="btn btn-danger" > Delete </a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>


</div>


