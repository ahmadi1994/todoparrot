@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{$name}}
                    You are logged in!
                     @if(count($info)>1)
                    @foreach($info as $in)
                        {{$in}}<br>
                        @endforeach
                         @else
                         you no have in fo

                         @endif
                </div>
                {!! HTML::image("img/sib_1.png") !!}
            </div>
        </div>
    </div>
</div>
@endsection
