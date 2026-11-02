@extends('layouts.app')

@section('title', 'Problems')

@section('content')
    <h2>Find solutions for a problem</h2>

    @if (session('status'))
        <p role="status">{{ session('status') }}</p>
    @endif

    <form method="GET" action="{{ route('problems.index') }}" aria-label="Search problems">
        <label for="search">Search by problem name or description</label>
        <input
            id="search"
            type="search"
            name="search"
            value="{{ $search }}"
            placeholder="e.g. communication"
        >
        <button type="submit">Search</button>
        @if ($search !== '')
            <a href="{{ route('problems.index') }}">Clear search</a>
        @endif
    </form>

    <p><a href="{{ route('problems.create') }}">Add problem</a></p>

    @if ($search !== '')
        <p>Search results for: <strong>{{ $search }}</strong></p>
    @endif

    <table>
        <thead>
            <tr>
                <th scope="col">Problem</th>
                <th scope="col">Description</th>
                <th scope="col">Related solutions</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($problems as $problem)
                <tr>
                    <td>{{ $problem->name }}</td>
                    <td>{{ $problem->description }}</td>
                    <td>
                        @forelse ($problem->solutions as $solution)
                            <div>
                                <strong>{{ $solution->name }}</strong>
                                @if ($solution->description)
                                    <p>{{ $solution->description }}</p>
                                @endif
                            </div>
                        @empty
                            <span>No solutions linked yet.</span>
                        @endforelse
                    </td>
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
                    <td colspan="4">
                        @if ($search !== '')
                            No problems matched your search.
                        @else
                            No problems yet.
                        @endif
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $problems->links() }}
@endsection
