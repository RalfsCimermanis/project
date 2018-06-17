@extends('Layout.app')

@section('content')
    <h1>Spēļu saraksts</h1>
    @if(count($games)>0)
        @foreach($games as $game)
            <table class="table">
                <tr>
            @foreach($teams as $team)
                @if ($game->team_id_1 == $team->id)

                            <td>
                                <img style="height: 250px; width: 250px" src="/storage/cover_images/{{$team->cover_image}}">
                            </td>
                            <td class="align-middle">
                                <h2 style="padding-right:0%"><a href="/teams/{{$team->id}}">{{$team->team_name}}</a></h2>
                            </td>
                @endif
                    @endforeach
                    <td class="align-middle">
                        <h1>PRET</h1>
                    </td>
                    @foreach($teams as $team)
                        @if ($game->team_id_2 == $team->id)
                        <td  class="align-middle">
                            <h2><a href="/teams/{{$team->id}}">{{$team->team_name}}</a></h2>
                        </td>

                        <td>
                        <img style="height: 250px; width: 250px" src="/storage/cover_images/{{$team->cover_image}}">
                        </td>

                        @endif
                    @endforeach
                </tr>
                <div  class="d-table-row align-middle"><p>spēle notiks {{$game->date}}</p></div>
            </table>
                @endforeach
    @else
        <p>Neviena Spēle netika atrasta</p>
    @endif


@endsection