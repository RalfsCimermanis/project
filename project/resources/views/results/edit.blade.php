@extends('Layout.app')

@section('content')
    <div><h1 class="mb-3 mt-3">@lang('messages.edit_result')</h1></div>
    <hr>
    {!! Form::open(['action' => ['ResultsController@update', $result->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::label('result_1', __('messages.result_first'))}}
        {{Form::Number('result_1', $result->result_1, ['class' => 'form-control', 'placeholder' => __('messages.result')])}}
    </div>
    <div class="form-group">
        {{Form::label('result_2', __('messages.result_second'))}}
        {{Form::Number('result_2', $result->result_2, ['class' => 'form-control', 'placeholder' => __('messages.result')])}}
    </div>
    {{Form::submit(__('messages.add'), ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection