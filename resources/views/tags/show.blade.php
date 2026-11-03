@extends('layouts.app')

@section('content')
    <h1>{{ $tag->name }}</h1>
    <p><a href="{{ route('tags.edit', $tag) }}">Edit</a> | <a href="{{ route('tags.index') }}">Back to list</a></p>
@endsection
