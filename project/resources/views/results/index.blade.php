@extends('Layout.app')

@section('content')
    <div><h1 class="mb-3 mt-3">Spēļu Rezultāti</h1></div>
    <div style="float: right;"> </div>
    @if(count($results)>0)
        @foreach($results as $result)
            <table class="table">
                <tr>
                    @foreach($teams as $team)
                        @if ($result->team_id_1 == $team->id)

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
                            <h1>{{$result->result_1}} : {{$result->result_2}}</h1>
                        </div>
                    </td>
                    @foreach($teams as $team)
                        @if ($result->team_id_2 == $team->id)
                            <td  class="align-middle" style="width: 20%;">
                                <h2><b><a href="/teams/{{$team->id}}">{{$team->team_name}}</a></b></h2>
                            </td>

                            <td style="width: 20%;">
                                <img style="height: 250px; width: 250px" src="/storage/cover_images/{{$team->cover_image}}">
                            </td>

                        @endif
                    @endforeach

                </tr>

                <td style="width: 20%;">
                </td>
                <td colspan="3" class="align-middle" style="width: 60%;">
                    <div class="mx-auto" style="width: 350px;">
                        <h2>Spēle notika {{$result->date}}</h2>
                    </div>

                <td style="width: 20%;">
                    @if(!Auth::guest())
                        @if((Auth::user()->id ==$result->user_id) or (Auth::user()->role == 'Admin'))
                            {!!Form::open(['action' => ['ResultsController@destroy', $result->id], 'method' => 'POST', 'class' => 'float-lg-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!! Form::close() !!}
                        @endif
                    @endif
                </td>
            </table>
        @endforeach
    @else
        <p>Neviens ieraksts par rezultātiem netika atrasts</p>
    @endif


@endsection