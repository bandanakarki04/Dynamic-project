<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProblemRequest;
use App\Http\Requests\UpdateProblemRequest;
use App\Models\Problem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProblemController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));

        $problems = Problem::query()
            ->with('solutions')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($problemQuery) use ($search) {
                    $problemQuery
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('problems.index', compact('problems', 'search'));
    }

    public function create(): View
    {
        return view('problems.create');
    }

    public function store(StoreProblemRequest $request): RedirectResponse
    {
        Problem::create($request->validated());

        return redirect()
            ->route('problems.index')
            ->with('status', 'Problem created.');
    }

    public function edit(Problem $problem): View
    {
        return view('problems.edit', compact('problem'));
    }

    public function update(
        UpdateProblemRequest $request,
        Problem $problem
    ): RedirectResponse {
        $problem->update($request->validated());

        return redirect()
            ->route('problems.index')
            ->with('status', 'Problem updated.');
    }

    public function destroy(Problem $problem): RedirectResponse
    {
        $problem->delete();

        return redirect()
            ->route('problems.index')
            ->with('status', 'Problem deleted.');
    }
}
