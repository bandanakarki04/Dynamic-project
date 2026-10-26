@extends('layouts.app')

@section('title', 'Problems')

@section('content')
    <h2>Problems</h2>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <p><a href="{{ route('problems.create') }}">Add problem</a></p>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($problems as $problem)
                <tr>
                    <td>{{ $problem->name }}</td>
                    <td>{{ $problem->description }}</td>
                    <td>
                        <a href="{{ route('problems.edit', $problem) }}">Edit</a>

                        <form
                            method="POST"
                            action="{{ route('problems.destroy', $problem) }}"
                            style="display: inline;"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('Are you sure you want to delete this problem?')"
                            >
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No problems yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $problems->links() }}
@endsection
