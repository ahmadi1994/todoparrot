@extends("layouts.app")
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">index</div>
                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
                @foreach($list as $li )
                    {{$li->name}}
                @endforeach
                {!!Form::Open()  !!}
                {!! Form::text("name") !!}
                {!!Form::close()  !!}
                {{--{!! HTML::image("img/sib_1.png") !!}--}}
                {!! Button::success('Success') !!}
            </div>

        </div>
@endsection