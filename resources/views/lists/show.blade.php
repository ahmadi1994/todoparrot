@extends("layouts.app")
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">show list</div>
                <div class="panel-body">
                Your Application's Landing Page.
                    @if(Session('message'))
                        <div class="alert alert-success">
                            {{Session('message')}}
                        </div>
                    @endif
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

                    <h1>{{$list->name}}</h1>
                    <h5>Created on: {{$list->created_at}}</h5>
                    <h5>Updated on: {{$list->updated_at}}</h5>
                    <h5></h5>{{$list->description}}<br>


                    {{--@if($list->tasks()->count()==0)--}}
 {{----}}
                        {{--<p>--}}
                            {{--No tasks assigned to this list.--}}
                        {{--</p>--}}
                    {{--@endif--}}



                        <a href="{{URL::route('list.edit', $list->id)}}">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['list.destroy', $list->id] ,"id"=>"t"])!!}
                    <button type="submit" class="btn btn-success" href="{{ URL::route('list.destroy', $list->id) }}" title="Delete list">
                        Delete
                    </button>
                    {!! Form::close() !!}
                    {{--{!! Form::open(['method' => 'DELETE', 'route' => ['list.destroy', $list->id] ,"id"=>"t"]) !!}--}}

                    {{--{!! Form::hidden('case_id', $list->id, ['class' => 'form-control']) !!}--}}

                    {{--{!! Form::button('<i class="glyphicon glyphicon-trash">Delete</i>', array('type' => 'button','onclick' => 'ConfirmDelete()', 'class' => 'specialButton')) !!}--}}

                    {{--{!! Form::close() !!}--}}


                    <h2>Tasks</h2>

                    <p>
                        <a href="{{ URL::route('list.tasks.create', $list->id) }}" class='btn btn-primary'>Add a task</a>
                    </p>

                    @if($list->tasks->count() == 0)

                        <p>
                            No tasks assigned to this list. <a href="/list/{{$list->id}}/tasks/create">Add a task</a>.
                        </p>

                    @else

                        <div class="table-responsive">
                            <table class="table table-striped">
                                @foreach ($list->tasks as $task)
                                    <tr>
                                        <td>
                                            @if($task->chick)
                                                <del><a href="{{ URL::route('list.tasks.edit', [$list->id, $task->id]) }}">{{ $task->name }}</a></del>
                                            @else
                                                <a href="{{ URL::route('list.tasks.edit', [$list->id, $task->id]) }}">{{ $task->name }}</a>
                                            @endif
                                        </td>
                                        <td style="text-align: right;">

                                            <div style="float: right; padding-right: 5px;">
                                                {!! Form::open(array('route' => array('list.tasks.destroy', $list->id, $task->id), 'method' => 'delete')) !!}
                                                <button type="submit" href="{{ URL::route('list.tasks.destroy', [$list->id, $task->id]) }}" class="glyphicon glyphicon-remove" title="Delete task"></button>
                                                {!! Form::close() !!}
                                            </div>

                                            <div style="float: right; padding-right: 5px;">
                                                {!! Form::open(array('route' => array('complete_task', $list->id, $task->id), 'method' => 'post')) !!}

                                                @if($task->done)
                                                    <button type="submit" href="{{ URL::route('complete_task', [$list->id, $task->id]) }}" class="glyphicon glyphicon-repeat" title="Mark Incomplete"></button>
                                                @else
                                                    <button type="submit" href="{{ URL::route('complete_task', [$list->id, $task->id]) }}" class="glyphicon glyphicon-ok" title="Mark complete"></button>
                                                @endif
                                                {!! Form::close() !!}
                                            </div>

                                            <div style="float: right; padding-right: 5px;">
                                                {!! Form::open(array('route' => array('list.tasks.edit', $list->id, $task->id), 'method' => 'get')) !!}
                                                <button type="submit" href="{{ URL::route('list.tasks.edit', [$list->id, $task->id]) }}" class="glyphicon glyphicon-pencil" title="Edit Task"></button>
                                                {!! Form::close() !!}
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection