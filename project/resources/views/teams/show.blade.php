@extends('Layout.app')

@section('content')
    <a href="/teams" class="btn btn-outline-secondary">Go Back</a>
    <h1>{{$team->team_name}}</h1>
    <hr>
    <h4>Komanadas apraksts</h4>
    <div>
        <p>
    {!!$team->info!!}
        </p>
    </div>
    <hr>
    <a href="/teams/{{$team->id}}/edit" class="btn btn-primary">Labot</a>

    {!!Form::open(['action' => ['TeamsController@destroy', $team->id], 'method' => 'POST', 'class' => 'float-lg-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
@endsection