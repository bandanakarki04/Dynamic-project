@extends('layouts.app')

@section('title', 'Edit Solution')

@section('content')
    <h2>Edit Solution</h2>

    <form method="POST" action="{{ route('solutions.update', $solution) }}">
        @csrf
        @method('PUT')

        <p>
            <label for="name">Name</label><br>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $solution->name) }}"
                required
            >

            @error('name')
                <br><span>{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="category">Category</label><br>
            <input
                type="text"
                id="category"
                name="category"
                value="{{ old('category', $solution->category) }}"
            >

            @error('category')
                <br><span>{{ $message }}</span>
            @enderror
        </p>

        <p>
    <label for="problems">Related Problems</label><br>

    <select
        id="problems"
        name="problems[]"
        multiple
        size="6"
    >
        @foreach ($problems as $problem)
            <option
                value="{{ $problem->id }}"
                @selected(
                    in_array(
                        $problem->id,
                        old('problems', $solution->problems->pluck('id')->toArray())
                    )
                )
            >
                {{ $problem->name }}
            </option>
        @endforeach
    </select>

    @error('problems')
        <br><span>{{ $message }}</span>
    @enderror

    @error('problems.*')
        <br><span>{{ $message }}</span>
    @enderror
        </p>

        <p>
            <label for="description">Description</label><br>
            <textarea
                id="description"
                name="description"
                rows="4"
            >{{ old('description', $solution->description) }}</textarea>

            @error('description')
                <br><span>{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">Update Solution</button>

        <a href="{{ route('solutions.index') }}">Cancel</a>
    </form>
@endsection