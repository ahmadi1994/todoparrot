@extends('layouts.app')
@section('content')

    <div class="panel-heading">Create a Task ({{ $list->name }})</div>

    <div class="panel-body">
            {!! Form::open(array('route' => array('list.tasks.store', $list->id), 'class' => 'form')) !!}

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
                {!! Form::label('Task Name') !!}
                {!! Form::text('name', null, array('required','class'=>'form-control', 'placeholder'=>'Task Name')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Description') !!}
                {!! Form::textarea('description', null, null, array('required','class'=>'form-control', 'placeholder' => date('Y-m-d'))) !!}
            </div>

            <div class="checkbox">
                {!! Form::label('Completed?') !!}
                {!! Form::checkbox('chick', 'true') !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create Task!', array('class'=>'btn btn-primary')) !!}
            </div>
            {!! Form::close() !!}

    </div>

    @endsection
