<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProblemRequest;
use App\Http\Requests\UpdateProblemRequest;
use App\Models\Problem;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProblemController extends Controller
{
    public function index(): View
    {
        $problems = Problem::orderBy('name')->paginate(10);

        return view('problems.index', compact('problems'));
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
