@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.dashboard')</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/teams/create" class="btn btn-outline-primary mb-3">@lang('messages.add_team')</a>
                    <h2>@lang('messages.team_list')</h2>
                        @if(count($teams)>0)
                    <table class="table table-striped">
                        <tr>
                            <td><h5> @lang('messages.the_title')</h5></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach($teams as $team)
                            <tr>
                                <td><a href="/teams/{{$team->id}}">{{$team->team_name}}</a></td>
                                <td><a href="/teams/{{$team->id}}/edit" class="btn btn-primary">@lang('messages.edit')</a></td>
                                <td>
                                    {!!Form::open(['action' => ['TeamsController@destroy', $team->id], 'method' => 'POST', 'class' => 'float-lg-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit(__('messages.delete'), ['class' => 'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                    </table>
                    @else
                    <p>@lang('messages.no_team')</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
