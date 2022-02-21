@include('Header')
@section('content')
<form action="/update-teacher/{{$teacher->id}}" enctype="multipart/form-data" method="post">
    {{ csrf_field() }}
    <input type="text" value="{{$teacher->first_name}}" name="first_name"/>
    <input type="text" value="{{$teacher->last_name}}" name="last_name"/>
    <hr/>
    <select id="subjects" name="subjects"  class="form-select">
        <option value="{{$teacher->subject_name}}" selected>{{$teacher->subject_name}}</option>
        @foreach($subjects as $subject)
            @if($subject->subject_name != $teacher->subject_name )
            <option value={{$subject->subject_name}}>{{$subject->subject_name}}</option>
            @endif
        @endforeach
    </select>
    <hr/>
    <input type="text" id="phoneNumber" name="phoneNumber" value="{{$teacher->phoneNumber}}" placeholder="PhoneNumber(023999999)" pattern="\d{0,9}" maxlength="11">
    <input type="submit" value="Confirm" class="btn btn-dark"/>

</form>
