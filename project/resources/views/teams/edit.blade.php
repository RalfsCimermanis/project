@extends('Layout.app')

@section('content')
    <h1>Labot komandu</h1>
    <hr>
    {!! Form::open(['action' => ['TeamsController@update', $team->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('team_name', 'Komandas Nosaukums')}}
        {{Form::text('team_name', $team->team_name, ['class' => 'form-control', 'placeholder' => 'Komandas nosaukums'])}}
    </div>
    <div class="form-group">
        {{Form::label('info', 'Informacija par komandu')}}
        {{Form::textarea('info', $team->info, ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Info'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Labot', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection