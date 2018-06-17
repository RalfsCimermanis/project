@extends('Layout.app')

@section('content')
    <div><h1 class="mb-3 mt-3">Pievienot rezultātu</h1></div>
    <hr>
    {!! Form::open(['action' => 'ResultsController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::Label('team_id_1', 'Izveleties pirmo komandu') !!}
        <select class="form-control" name="team_id_1">
            @foreach($teams as $team)
                <option value="{{$team->id}}">{{$team->team_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {!! Form::Label('team_id_2', 'Izveleties otro komandu') !!}
        <select class="form-control" name="team_id_2">
            @foreach($teams as $team)
                <option value="{{$team->id}}">{{$team->team_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {{Form::label('result_1', 'Rezultāts pirmajai komandai')}}
        {{Form::Number('result_1', '', ['class' => 'form-control', 'placeholder' => 'Rezultāts'])}}
    </div>
    <div class="form-group">
        {{Form::label('result_2', 'Rezultāts otrajai komandai')}}
        {{Form::Number('result_2', '', ['class' => 'form-control', 'placeholder' => 'Rezultāts'])}}
    </div>
    <div class="form-group">
        {{Form::label('date', 'Datums')}}
        {{Form::text('date', '', ['class' => 'form-control', 'placeholder' => 'YYYY-MM-DD'])}}
    </div>

    {{Form::submit('Pievienot', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection