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
                </div>
            </div>

        </div>
    </div>
@endsection