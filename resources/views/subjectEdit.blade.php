@include('Header')
@section('content')
    <form method="post" action="/update-subject/{{$subjects->id}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" id="subject_name" value="{{$subjects->subject_name}}" name="subject_name" placeholder="Subject Name"/>
        <input type="number" id="hours" value="{{$subjects->hours}}" name="hours" placeholder="Credits"/>
        <input type="submit" class="btn btn-primary" value="Confirm"/>
    </form>
