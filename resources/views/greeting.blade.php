@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @@parent

    <p>ここはメインのサイドバーに追加される</p>
@endsection

@component('alert', ['msg' => 'fine day'])
    @slot('title')
        Forbidden
    @endslot

    You are not allowed to access this resource!
@endcomponent

<script>
    var app = 'sunny';
</script>
@verbatim
    <div>
        verbatim Hello, {{ app }}.
    </div>
@endverbatim

@section('content')
    <p>Hello, {{ $name }}</p>
    @datetime(now())
@endsection