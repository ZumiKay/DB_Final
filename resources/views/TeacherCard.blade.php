@include('Header')
@section('content')
<h1 style="text-decoration: underline; text-shadow: 3.5px 1px pink">List of Teacher ID Cards in International HighSchool</h1>
<button type="button" data-bs-toggle="modal" data-bs-target="#addmodal"  class="btn btn-dark">Create New TeacherID Cards</button>
<a class="btn btn-dark" href="/subjects"> View All Subjects</a>
<a class="btn btn-dark" href="/home"> View All Teachers</a>
<a class="btn btn-dark" href="/"> Back To HomePage</a>
@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif




<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Add New Card</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <form method="post" action="/create-teacherId" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="text" id="cardID" name="cardID" placeholder="Card ID"/>
                        <input type="text" id="teacherName" name="teacherName" placeholder="FirstName"/>
                        <button type="submit" id="form-btn" class="btn btn-primary">Create Teacher ID</button>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
<div style="margin-top: 50px">
    <table class="table table-dark table-striped">
        <thead>
        <th>#</th>
        <th>CardID</th>
        <th>Ms/Mr.</th>
        <th>FullName</th>
        <th>Subjects</th>
        <th>Actions</th>
        </thead>
        <tbody>
        @foreach($cards as $card)
            <tr class="table-secondary ">
                <td>{{$card->id}}</td>
                <td>{{$card->cardId}}</td>
                <td>{{$card->name}}</td>
                <td>{{$card->teacher->first_name ?? ''}} {{$card->teacher->last_name ?? ''}}</td>
                <td>{{$card->teacher->subject_name ?? ''}}</td>
                <td>

                    <a href="/deleteTeacherID/{{$card->id}}" class="btn btn-danger" > Delete </a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>


</div>

