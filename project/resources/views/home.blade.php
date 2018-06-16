@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panelis</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/teams/create" class="btn btn-outline-primary ">Pievienot komandu</a>
                    <h2>Komandu sarakts</h2>
                        @if(count($teams)>0)
                    <table class="table table-striped">
                        <tr>
                            <td><h5> Nosaukums</h5></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach($teams as $team)
                            <tr>
                                <td>{{$team->team_name}}</td>
                                <td><a href="/teams/{{$team->id}}/edit" class="btn btn-primary">Labot</a></td>
                                <td>
                                    {!!Form::open(['action' => ['TeamsController@destroy', $team->id], 'method' => 'POST', 'class' => 'float-lg-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                    </table>
                    @else
                    <p>Nav nevienas komandas</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
