@extends("layouts.app")
@section("content")

                <div class="panel-heading">Update</div>
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
                <div class="panel-body">


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

@endsection