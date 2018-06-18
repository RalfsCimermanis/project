@extends('Layout.app')

@section('content')

    <main role="main" class="container">
        <div class="jumbotron">
            <h1>@lang('messages.welcome')</h1>
            <hr>
            <h3>@lang('messages.about_p')</h3>
            <p class="lead">@lang('messages.about_text)</p>
        </div>
    </main>
@endsection