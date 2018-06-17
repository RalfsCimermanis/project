@extends('Layout.app')

@section('content')
    <div><h1 class="mb-3 mt-3">Labot komandu</h1></div>
    <hr>
    {!! Form::open(['action' => ['TeamsController@update', $team->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('team_name', 'Komandas Nosaukums')}}
        {{Form::text('team_name', $team->team_name, ['class' => 'form-control', 'placeholder' => 'Komandas nosaukums'])}}
    </div>
    <div class="form-group">
        {{Form::label('info', 'Informacija par komandu')}}
        {{Form::textarea('info', $team->info, ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Info'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Labot', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection