@extends('Layout.app')

@section('content')
    <h1>Pievienot komandu</h1>
    <hr>
    {!! Form::open(['action' => 'TeamsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('team_name', 'Komandas Nosaukums')}}
        {{Form::text('team_name', '', ['class' => 'form-control', 'placeholder' => 'Komandas nosaukums'])}}
    </div>
    <div class="form-group">
        {{Form::label('info', 'Informacija par komandu')}}
        {{Form::textarea('info', '', ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Info'])}}
    </div>
    {{Form::submit('Pievienot', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection