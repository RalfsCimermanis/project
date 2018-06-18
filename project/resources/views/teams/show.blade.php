@extends('Layout.app')

@section('content')
   <div class="mb-3 mt-3"><a href="/teams" class="btn btn-outline-secondary">@lang('messages.about_team')</a></div>
    <img style="height: 250px; width: 250px " class="rounded float-left mr-3" src="/storage/cover_images/{{$team->cover_image}}">
   <div class="align-middle"><h1>{{$team->team_name}}</h1></div>
   <div class="mb-2"><small>@lang('messages.trainer') {{$team->user->name}}</small></div>
    <h4 >@lang('messages.about_team')</h4>
    <div>
        <p>
    {!!$team->info!!}
        </p>
    </div>
    <hr>
    @if(!Auth::guest())
        @if((Auth::user()->id ==$team->user_id) or (Auth::user()->role == 'Admin'))
    <a href="/teams/{{$team->id}}/edit" class="btn btn-primary">@lang('messages.edit')</a>

    {!!Form::open(['action' => ['TeamsController@destroy', $team->id], 'method' => 'POST', 'class' => 'float-lg-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit(__('messages.delete'), ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
    @endif
    @endif
@endsection