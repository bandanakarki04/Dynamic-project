@extends('layouts.app')

@section('content')
    <h1>Add tag</h1>
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        @include('tags._form')
    </form>
@endsection
