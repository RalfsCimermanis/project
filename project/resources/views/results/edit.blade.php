@extends('Layout.app')

@section('content')
    <div><h1 class="mb-3 mt-3">Izlabot rezultātu</h1></div>
    <hr>
    {!! Form::open(['action' => ['ResultsController@update', $result->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::label('result_1', 'Rezultāts pirmajai komandai')}}
        {{Form::Number('result_1', $result->result_1, ['class' => 'form-control', 'placeholder' => 'Rezultāts'])}}
    </div>
    <div class="form-group">
        {{Form::label('result_2', 'Rezultāts otrajai komandai')}}
        {{Form::Number('result_2', $result->result_2, ['class' => 'form-control', 'placeholder' => 'Rezultāts'])}}
    </div>
    {{Form::submit('Pievienot', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection