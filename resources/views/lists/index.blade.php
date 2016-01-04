@extends("layouts.app")
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">index</div>
                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
                <div class="panel-body">
                    @foreach($lists as $lis)
                        year : {{$lis->year}} conut :{{$lis->count}}<br>
                    @endforeach
                    <?php $count=0; ?>
                    @foreach($list as $key => $li )

                            <a href="\list\{{$li->id}}"> <h1> {{$li->id}} {{$li->name}}</h1></a>
                    @endforeach
                    {!! $list->render() !!}
                </div>
                {!!Form::Open()  !!}
                {!! Form::text("name") !!}
                {!!Form::close()  !!}
                {{--{!! HTML::image("img/sib_1.png") !!}--}}
                {!! Button::success('Success') !!}
            </div>

        </div>
    </div>
@endsection