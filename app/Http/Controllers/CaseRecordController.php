<?php

namespace App\Http\Controllers;

use App\Models\CaseRecord;
use App\Models\Problem;
use App\Models\Solution;
use App\Models\Kpi;

class CaseRecordController extends Controller
{
    public function index()
    {
        $cases = CaseRecord::all();

        return view('cases.index', compact('cases'));
    }

    public function create()
    {
        $problems = Problem::orderBy('name')->get();
        $solutions = Solution::orderBy('name')->get();
        $kpis = Kpi::orderBy('name')->get();

        return view('cases.create', compact(
            'problems',
            'solutions',
            'kpis'
        ));
    }
}