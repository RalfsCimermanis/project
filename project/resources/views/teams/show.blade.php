@extends('Layout.app')

@section('content')
    <a href="/teams" class="btn btn-outline-secondary">Go Back</a>
    <h1>{{$team->team_name}}</h1>
    <hr>
    <h4>Komanadas apraksts</h4>
    <div>
        <p>
            {{$team->info}}
        </p>
    </div>
@endsection