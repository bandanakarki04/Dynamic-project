@extends('layouts.app')

@section('title', 'Solutions')

@section('content')
    <h2>Solutions</h2>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <a href="{{ route('solutions.create') }}">Add New Solution</a>

    @if ($solutions->isEmpty())
        <p>No solutions found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($solutions as $solution)
                    <tr>
                        <td>{{ $solution->name }}</td>
                        <td>{{ $solution->category ?? '-' }}</td>
                        <td>{{ $solution->description ?? '-' }}</td>
                        <td>
                            <a href="{{ route('solutions.show', $solution) }}">View</a>

                            <a href="{{ route('solutions.edit', $solution) }}">Edit</a>

                            <form
                                method="POST"
                                action="{{ route('solutions.destroy', $solution) }}"
                                style="display:inline"
                                onsubmit="return confirm('Are you sure you want to delete this solution?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $solutions->links() }}
    @endif
@endsection