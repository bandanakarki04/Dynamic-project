@extends('layouts.app')

@section('content')
    <h1>Edit tag</h1>
    <form action="{{ route('tags.update', $tag) }}" method="POST">
        @csrf
        @method('PUT')
        @include('tags._form')
    </form>
@endsection
