@extends("layouts.app")
@section("content")
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Update</div>
                <div class="panel-body">
                    Your Application's Landing Page.
                        @if(empty($message))
                        <br>eeeeeeeeeeeeeeeeeeee
                        @endif
                        {!! Form::model($list, array('method' => 'put', 'route' => ['list.update', $list->id], 'class' => 'form')) !!}
                         <div class="form-group">
                            {!! Form::label('List Name') !!}
                            {!! Form::text('name', null,
                            array('required', 'class'=>'form-control',
                            'placeholder'=>'San Juan Vacation')) !!}
                            </div>
                                <div class="form-group">
                             {!! Form::label('List Description') !!}
                             {!! Form::textarea('description', null,
                             array('required', 'class'=>'form-control',
                             'placeholder'=>'Things to do before leaving for vacation')) !!}
                               </div>
                            <div class="form-group">
                             {!! Form::submit('Update List', array('class'=>'btn btn-primary')) !!}
                             </div>
                            {!! Form::close() !!}


                </div>
            </div>

        </div>
    </div>
@endsection