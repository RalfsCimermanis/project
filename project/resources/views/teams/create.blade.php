@extends('Layout.app')

@section('content')
    <div><h1 class="mb-3 mt-3"> @lang('messages.add_team')</h1></div>
    <hr>
    {!! Form::open(['action' => 'TeamsController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('team_name',  __('messages.team_name'))}}
        {{Form::text('team_name', '', ['class' => 'form-control', 'placeholder' =>  __('messages.team_name')])}}
    </div>
    <div class="form-group">

        {{Form::label('info', __('messages.team_info'))}}
        {{Form::textarea('info', '', ['class' => 'form-control', 'placeholder' => __('messages.team_info')])}}


    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{Form::submit( __('messages.add'), ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection