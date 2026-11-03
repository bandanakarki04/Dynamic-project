@extends('layouts.app')

@section('title', 'Edit Tag')

@section('content')
    <h2>Edit Tag</h2>

    <form action="{{ route('tags.update', $tag) }}" method="POST">
        @csrf
        @method('PUT')
        @include('tags._form')
    </form>
@endsection