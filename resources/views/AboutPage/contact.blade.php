@extends("layouts.app")
@section("content")
    <div class="panel-heading">Contact TODOparrot</div>

    <div class="panel-body">
        You are logged in!
        @if(Session::has("message"))
            {{Session::get('message')}}
        @endif

        <ul>
            @foreach($errors as $error)
                <li>{{$error}}</li>
            @endforeach

        </ul>
        {!! Form::open(array('route'=>'contact_post','class'=>'form')) !!}
        <div class="form-group">
            {!!Form::label("Your Name") !!}
            {!!Form::text("name",null,array('required','placeholder'=>"Your Name","class"=>"form-control")) !!}

        </div>
        <div class="form-group">
            {!!Form::label("Your E-mail Address") !!}
            {!!Form::text("email",null,array('required','placeholder'=>"Your E-mail Adress","class"=>"form-control")) !!}

        </div>
        <div class="form-group">
            {!!Form::label("Your Message") !!}
            {!!Form::textarea("message",null,array('required','placeholder'=>"Your Message","class"=>"form-control")) !!}

        </div>
        <div class="form-group">
            {!! Form::submit('Contact Us!',array('class'=>"btn btn-primary")) !!}
        </div>


        {!! Form::close() !!}

    </div>


@endsection