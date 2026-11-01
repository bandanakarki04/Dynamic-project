<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    // Display all solutions
    public function index()
    {
        $solutions = Solution::orderBy('name')->paginate(10);

        return view('solutions.index', compact('solutions'));
    }

    // Show the form for creating a solution
    public function create()
    {
        return view('solutions.create');
    }

    // Store a new solution
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
        ]);

        Solution::create($validated);

        return redirect()
            ->route('solutions.index')
            ->with('status', 'Solution created.');
    }

    // Display one solution
    public function show(string $id)
    {
        $solution = Solution::findOrFail($id);

        return view('solutions.show', compact('solution'));
    }

    // Show the form for editing a solution
    public function edit(string $id)
    {
        $solution = Solution::findOrFail($id);

        return view('solutions.edit', compact('solution'));
    }

    // Update a solution
    public function update(Request $request, string $id)
    {
        $solution = Solution::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
        ]);

        $solution->update($validated);

        return redirect()
            ->route('solutions.index')
            ->with('status', 'Solution updated.');
    }

    // Delete a solution
    public function destroy(string $id)
    {
        $solution = Solution::findOrFail($id);

        $solution->delete();

        return redirect()
            ->route('solutions.index')
            ->with('status', 'Solution deleted.');
    }
}