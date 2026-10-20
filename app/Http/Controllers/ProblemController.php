<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProblemRequest;
use App\Models\Problem;

class ProblemController extends Controller
{
    public function index()
    {
        $problems = Problem::orderBy('name')->paginate(10);

        return view('problems.index', compact('problems'));
    }

    public function create()
    {
        return view('problems.create');
    }

    public function store(StoreProblemRequest $request)
    {
        Problem::create($request->validated());

        return redirect()
            ->route('problems.index')
            ->with('status', 'Problem created.');
    }
}