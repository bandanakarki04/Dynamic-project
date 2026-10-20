@extends('layouts.app')

@section('title', 'Add problem')

@section('content')
    <h2>Add problem</h2>

    <form method="POST" action="{{ route('problems.store') }}">
        @csrf

        <p>
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name') <br><span>{{ $message }}</span> @enderror
        </p>

        <p>
            <label for="area">Area</label><br>
            <input type="text" id="area" name="area" value="{{ old('area') }}">
            @error('area') <br><span>{{ $message }}</span> @enderror
        </p>

        <p>
            <label for="description">Description</label><br>
            <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>
            @error('description') <br><span>{{ $message }}</span> @enderror
        </p>

        <button type="submit">Save</button>
        <a href="{{ route('problems.index') }}">Cancel</a>
    </form>
@endsection
