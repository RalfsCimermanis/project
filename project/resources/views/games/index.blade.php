@extends('Layout.app')

@section('content')
    <div><h1 class="mb-3 mt-3">@lang('messages.game_list')</h1></div>
    <div style="float: right;"> </div>
    @if(count($games)>0)
        @foreach($games as $game)
            <table class="table">
                <tr>
            @foreach($teams as $team)
                @if ($game->team_id_1 == $team->id)

                            <td style="width: 20%;">
                                <img style="height: 250px; width: 250px" src="/storage/cover_images/{{$team->cover_image}}" alt="/storage/cover_images/noimage.jpg">
                            </td>
                            <td class="align-middle" style="width: 20%;">
                                <h2 style="padding-right:0%"><b><a href="/teams/{{$team->id}}">{{$team->team_name}}</a></b></h2>
                            </td>
                @endif
                    @endforeach
                    <td class="align-middle" style="width: 20%;">
                       <div class="mx-auto" style="width: 100px;">
                           <h1>@lang('messages.versus')</h1>
                       </div>
                    </td>
                    @foreach($teams as $team)
                        @if ($game->team_id_2 == $team->id)
                        <td  class="align-middle" style="width: 20%;">
                            <h2><b><a href="/teams/{{$team->id}}">{{$team->team_name}}</a></b></h2>
                        </td>

                        <td style="width: 20%;">
                        <img style="height: 250px; width: 250px" src="/storage/cover_images/{{$team->cover_image}}" alt="/storage/cover_images/noimage.jpg">
                        </td>

                        @endif
                    @endforeach

                </tr>
                <tr>
                    <td style="width: 20%;"></td>
                    <td colspan="3" class="align-middle" style="width: 60%;">
                        <div class="mx-auto" style="width: 350px;">
                        <h5>@lang('messages.game_happen') {{$game->date}}</h5>
                        </div>

                <td style="width: 20%;">
                    @if(!Auth::guest())
                        @if((Auth::user()->id ==$game->user_id) or (Auth::user()->role == 'Admin'))
                    {!!Form::open(['action' => ['GamesController@destroy', $game->id], 'method' => 'POST', 'class' => 'float-lg-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit(__('messages.delete'), ['class' => 'btn btn-danger'])}}
                    {!! Form::close() !!}
                    @endif
                    @endif
                </td>
                </tr>
            </table>
                @endforeach
    @else
        <p>@lang('messages.no_game')</p>
    @endif


@endsection