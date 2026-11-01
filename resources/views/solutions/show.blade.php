@extends('layouts.app')

@section('title', 'Solution Details')

@section('content')
    <h2>Solution Details</h2>

    <p>
        <strong>Name:</strong>
        {{ $solution->name }}
    </p>

    <p>
        <strong>Category:</strong>
        {{ $solution->category ?? '-' }}
    </p>

    <p>
        <strong>Description:</strong>
        {{ $solution->description ?? '-' }}
    </p>

    <p>
        <a href="{{ route('solutions.edit', $solution) }}">Edit</a>

        <a href="{{ route('solutions.index') }}">Back to Solutions</a>
    </p>

    <form
        method="POST"
        action="{{ route('solutions.destroy', $solution) }}"
        onsubmit="return confirm('Are you sure you want to delete this solution?')"
    >
        @csrf
        @method('DELETE')

        <button type="submit">Delete Solution</button>
    </form>
@endsection