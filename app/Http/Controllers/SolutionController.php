<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::with('problems')
            ->orderBy('name')
            ->paginate(10);

        return view('solutions.index', compact('solutions'));
    }

    public function create()
    {
        $problems = Problem::orderBy('name')->get();

        return view('solutions.create', compact('problems'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'problems' => 'nullable|array',
            'problems.*' => 'integer|distinct|exists:problems,id',
        ]);

        DB::transaction(function () use ($validated) {
            $solution = Solution::create([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
                'category' => $validated['category'] ?? null,
            ]);

            $solution->problems()->sync($validated['problems'] ?? []);
        });

        return redirect()
            ->route('solutions.index')
            ->with('status', 'Solution created.');
    }

    public function show(string $id)
    {
        $solution = Solution::with('problems')->findOrFail($id);

        return view('solutions.show', compact('solution'));
    }

    public function edit(string $id)
    {
        $solution = Solution::with('problems')->findOrFail($id);
        $problems = Problem::orderBy('name')->get();

        return view('solutions.edit', compact('solution', 'problems'));
    }

    public function update(Request $request, string $id)
    {
        $solution = Solution::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'problems' => 'nullable|array',
            'problems.*' => 'integer|distinct|exists:problems,id',
        ]);

        DB::transaction(function () use ($solution, $validated) {
            $solution->update([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
                'category' => $validated['category'] ?? null,
            ]);

            $solution->problems()->sync($validated['problems'] ?? []);
        });

        return redirect()
            ->route('solutions.index')
            ->with('status', 'Solution updated.');
    }

    public function destroy(string $id)
    {
        $solution = Solution::findOrFail($id);

        $solution->delete();

        return redirect()
            ->route('solutions.index')
            ->with('status', 'Solution deleted.');
    }
}