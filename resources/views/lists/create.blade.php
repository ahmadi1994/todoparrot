@extends("layouts.app")
@section("content")
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create</div>
                <div class="panel-body">
                    Your Application's Landing Page.
                    {!! Form::open(array("route"=>"list.store")) !!}
                    {!! Form::text("name") !!}
                    {!! Form::textArea("description") !!}
                    {!! Form::submit("ee")!!}
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection