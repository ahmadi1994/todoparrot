@extends("layouts.app")
@section("content")
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Update</div>
                <div class="panel-body">
                    Your Application's Landing Page.
                    {{--{!! Form::open(array("route"=>"list.create")) !!}--}}
                    {!! Form::model($list, array('method' => 'put', 'route' => ['list.update', $list->id],'class' => 'form')) !!}
                    {!! Form::text("name")!!}
                    {!! Form::textArea("description") !!}
                    {!! Form::submit('Update')!!}
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection