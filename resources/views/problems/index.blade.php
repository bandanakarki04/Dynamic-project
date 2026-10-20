
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
            </tr>
        </thead>
        <tbody>
            @forelse ($problems as $problem)
                <tr>
                    <td>{{ $problem->name }}</td>
                    <td>{{ $problem->description }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No problems yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $problems->links() }}
@endsection
