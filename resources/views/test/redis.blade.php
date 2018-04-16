@extends('app')
@section('content')
    <div class="container">
        <h3>Hello! You are visitor number #{{ $visits ?? 'test' }}</h3>
        <h4>Some video</h4>
        <p>This video has been downloaded {{ $downloads ?? 'no' }} times.</p>
    </div>
@endsection
