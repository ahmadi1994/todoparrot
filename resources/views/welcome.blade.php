@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
                {!! HTML::image("img/sib_1.png") !!}
                {!! Button::success('Success') !!}
             </div>
            {!!Form::Open()  !!}
             {!! Form::text("name") !!}
            {!!Form::close()  !!}

        </div>
    </div>
</div>
@endsection
