@extends('Layout.app')

@section('content')
    <h1>Komandu saraksts</h1>
    @if(count($teams)>0)
        @foreach($teams as $team)
            <div class="card">
                <h2><a href="/teams/{{$team->id}}">{{$team->team_name}}</a></h2>
                <p>{!!$team->info!!}</p>
            </div>
            @endforeach
    @else
        <p>Neviena komanda netika atrasta</p>
    @endif

    <a href="/teams/create" class="btn btn-secondary" role="button" >Pievienot komandu</a>
@endsection