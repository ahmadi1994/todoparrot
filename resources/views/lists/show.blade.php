@extends("layouts.app")
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">show list</div>
                <div class="panel-body">
                Your Application's Landing Page.
                    <br>
                 <h1>{{$data->name}}</h1>
                    <h5>Created on: {{$data->created_at}}</h5>
                    <h5>Updated on: {{$data->updated_at}}</h5>
                    <h5></h5>{{$data->description}}<br>
                    <a href=""></a>
                    <a href="{{URL::route('list.edit', $data->id)}}">Edit</a>
                    {!! Form::open(array('route' => array('list.destroy', $data->id), 'method' => 'delete')) !!}
                    <button type="submit" class="btn btn-success" href="{{ URL::route('list.destroy', $data->id) }}" title="Delete list">
                        Delete
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection