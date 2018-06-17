@extends('Layout.app')

@section('content')
    <h1>Komandu saraksts</h1>
    @if(count($teams)>0)
        @foreach($teams as $team)
            <div class="card">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="height: 250px; width: 250px" src="/storage/cover_images/{{$team->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h2><a href="/teams/{{$team->id}}">{{$team->team_name}}</a></h2>
                        <small>Treneris {{$team->user->name}}</small>
                        <p>{!!$team->info!!}</p>
                    </div>
                </div>

            </div>
            @endforeach
    @else
        <p>Neviena komanda netika atrasta</p>
    @endif


@endsection