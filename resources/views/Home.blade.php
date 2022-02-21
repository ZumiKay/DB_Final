@include('Header')
@section('content')
        <h1 style="text-decoration: underline; text-shadow: 3.5px 1px pink">List of Teachers in International HighSchool</h1>
        <button type="button" data-bs-toggle="modal" data-bs-target="#addmodal"  class="btn btn-dark">Add New Teacher</button>
        <a class="btn btn-dark" href="/teacherID" >View Teacher ID Cards</a>
        <a class="btn btn-dark" href="/subjects"> View All Subjects</a>
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
                        <h5 class="modal-title"> Add New Teacher</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                            <div class="mb-3">
                                <form method="post" action="/create-teacher" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="text" id="firstname" name="firstname" placeholder="firstname"/>
                                    <input type="text" id="lastname" name="lastname" placeholder="lastname"/>
                                    <hr/>
                                    <select id="subjects" name="subjects" class="form-select">
                                        <option selected>Please Select Subjects</option>
                                        @foreach($subjects as $subject)
                                            <option value={{$subject->subject_name}}>{{$subject->subject_name}}</option>
                                        @endforeach
                                    </select>
                                    <hr/>
                                    <input type="text" id="phonenumber" name="phonenumber" placeholder="PhoneNumber(023999999)" pattern="\d{0,9}" maxlength="11">
                                    <button type="submit" id="form-btn" class="btn btn-primary">Add teacher</button>
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
                <th>FirstName</th>
                <th>LastName</th>
                <th>Phone Number</th>
                <th>Subjects</th>
                <th>IDCard</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($teacher as $teachers)

                    <tr class="table-secondary ">
                        <td>{{$teachers->id}}</td>
                        <td>{{$teachers->first_name}}</td>
                        <td>{{$teachers->last_name}}</td>
                        <td>{{$teachers->phoneNumber}}</td>
                        <td>{{$teachers->subject_name}}</td>

                        <td>{{$teachers->card->cardId ?? ''}}</td>

                        <td>
                            <a href="/teacher-edit/{{$teachers->id}}" class="btn btn-dark"> Edits </a>
                            <a href="/deleteTeacher/{{$teachers->id}}" class="btn btn-danger" > Delete </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>


        </div>


