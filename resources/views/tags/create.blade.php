@extends('layouts.app')

@section('title', 'Add Tag')

@section('content')
    <h2>Add Tag</h2>

    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        @include('tags._form')
    </form>
@endsection