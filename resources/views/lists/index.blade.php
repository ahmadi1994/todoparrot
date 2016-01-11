@extends("layouts.app")
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">index</div>

                <div class="panel-body">
                    @if(Session('message'))
                        <div class="alert alert-success">
                            {{Session('message')}}
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                <div class="panel-body">
                    @foreach($lists as $lis)
                        year : {{$lis->year}} conut :{{$lis->count}}<br>
                    @endforeach
                    <?php $count=0; ?>
                    @foreach($list as $key => $li )

                            <a href="\list\{{$li->id}}"> <h1> {{$li->id}} {{$li->name}}</h1></a>
                    @endforeach
                    {!! $list->render() !!}<br>
                       <a href="list\create"> {!! Button::success('Create List') !!}</a>
                </div>
            </div>

        </div>
    </div>
@endsection