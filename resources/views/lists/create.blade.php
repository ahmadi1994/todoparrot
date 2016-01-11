@extends("layouts.app")
@section("content")
    <div class="col-md-6">
        {!! Form::open(array('route' => 'list.store', 'class' => 'form', 'novalidate' => 'novalidate')) !!}

        <h2>Create a TODO List</h2>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                There were some problems with your input.<br />
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            {!! Form::label('Your List Name') !!}
            {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'List Name')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('List Category') !!}<br />
            {!! Form::select('category', array_merge(['0' => 'Select a Category'], $categories), null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Your List Description') !!}
            {!! Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Enter a short description')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create List!', array('class'=>'btn btn-primary')) !!}
        </div>
        {!! Form::close() !!}
    </div>

    {{--<div class="row">--}}
        {{--<div class="col-md-10 col-md-offset-1">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Create a New List</div>--}}
                {{--<div class="panel-body">--}}
                    {{--Your Application's Landing Page.--}}
                    {{--@if (count($errors) > 0)--}}
                        {{--<div class="alert alert-danger">--}}
                            {{--There were some problems with your input.<br />--}}
                            {{--<ul>--}}
                                {{--@foreach ($errors->all() as $error)--}}
                                    {{--<li>{{ $error }}</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--{!! Form::open(["route"=>"list.store","class"=>"form"]) !!}--}}
                        {{--<div class="form-group">--}}
                            {{--{!! Form::label("List Name") !!}--}}
                            {{--{!! Form::text("name",null,['required','placeholder'=>'Enter List Name hear','class'=>"form"]) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--{!! Form::label("List Description") !!}--}}
                            {{--{!! Form::textarea("description",null,['required','placeholder'=>'Enter Description','class'=>"form"]) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--{!! Form::submit('Create List',['class'=>'btn btn-primary']) !!}--}}
                        {{--</div>--}}
                    {{--{!! Form::close() !!}--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
@endsection