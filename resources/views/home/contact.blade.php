@extends('layouts.app')

@section('title', 'Contact page')

@section('content')
<h1>Contact page</h1>

@can('home.secret')
    <a href="{{ route('secret') }}">Go to special contact details!</a>
@endcan
@endsection
