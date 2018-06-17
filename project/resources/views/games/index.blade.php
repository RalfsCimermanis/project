@extends('Layout.app')

@section('content')
    <div><h1 class="mb-3 mt-3">Spēļu saraksts</h1></div>
    <div style="float: right;"> </div>
    @if(count($games)>0)
        @foreach($games as $game)
            <table class="table">
                <tr>
            @foreach($teams as $team)
                @if ($game->team_id_1 == $team->id)

                            <td style="width: 20%;">
                                <img style="height: 250px; width: 250px" src="/storage/cover_images/{{$team->cover_image}}">
                            </td>
                            <td class="align-middle" style="width: 20%;">
                                <h2 style="padding-right:0%"><b><a href="/teams/{{$team->id}}">{{$team->team_name}}</a></b></h2>
                            </td>
                @endif
                    @endforeach
                    <td class="align-middle" style="width: 20%;">
                       <div class="mx-auto" style="width: 100px;">
                           <h1>PRET</h1>
                       </div>
                    </td>
                    @foreach($teams as $team)
                        @if ($game->team_id_2 == $team->id)
                        <td  class="align-middle" style="width: 20%;">
                            <h2><b><a href="/teams/{{$team->id}}">{{$team->team_name}}</a></b></h2>
                        </td>

                        <td style="width: 20%;">
                        <img style="height: 250px; width: 250px" src="/storage/cover_images/{{$team->cover_image}}">
                        </td>

                        @endif
                    @endforeach
                </tr>
                <tr><td colspan="5" class="align-middle" style="width: 20%;">
                        <div class="mx-auto" style="width: 350px;">
                        <h2>Spēle notiks {{$game->date}}</h2>
                        </div>
                    </td>
                </tr>
            </table>
                @endforeach
    @else
        <p>Neviena Spēle netika atrasta</p>
    @endif


@endsection