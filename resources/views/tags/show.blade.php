@extends('layouts.app')

@section('title', 'Tag Details')

@section('content')
    <h2>{{ $tag->name }}</h2>

    <p>
        <a href="{{ route('tags.edit', $tag) }}">Edit</a>
        |
        <a href="{{ route('tags.index') }}">Back to list</a>
    </p>
@endsection