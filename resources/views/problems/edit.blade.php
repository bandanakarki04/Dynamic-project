@extends('layouts.app')

@section('title', 'Edit problem')

@section('content')
    <h2>Edit problem</h2>

    <form method="POST" action="{{ route('problems.update', $problem) }}">
        @csrf
        @method('PUT')

        <p>
            <label for="name">Name</label><br>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $problem->name) }}"
                required
            >
            @error('name')
                <br><span>{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="description">Description</label><br>
            <textarea
                id="description"
                name="description"
                rows="4"
            >{{ old('description', $problem->description) }}</textarea>
            @error('description')
                <br><span>{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">Update problem</button>
        <a href="{{ route('problems.index') }}">Cancel</a>
    </form>
@endsection
