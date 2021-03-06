@extends('Layout.app')

@section('content')
    <h1 class="mb-3 mt-3">@lang('messages.team_list')</h1>
    @if(count($teams)>0)
        @foreach($teams as $team)
            <div class="card">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="height: 250px; width: 250px" src="/storage/cover_images/{{$team->cover_image}}" alt="/storage/cover_images/noimage.jpg">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h2><b><a href="/teams/{{$team->id}}">{{$team->team_name}}</a></b></h2>
                        <small>@lang('messages.trainer') {{$team->user->name}}</small>
                        <p>{!!$team->info!!}</p>
                    </div>
                </div>

            </div>
            @endforeach
    @else
        <p>@lang('messages.no_team')</p>
    @endif


@endsection