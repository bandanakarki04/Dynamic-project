<?php

namespace App\Http\Controllers;

use App\Http\Requests\KpiRequest;
use App\Models\Kpi;
use Illuminate\Database\QueryException;

class KpiController extends Controller
{
    public function index()
    {
        $kpis = Kpi::orderBy('name')->paginate(15);
        return view('kpis.index', compact('kpis'));
    }

    public function create()
    {
        return view('kpis.create');
    }

    public function store(KpiRequest $request)
    {
        Kpi::create($request->validated());
        return redirect()->route('kpis.index')->with('success', 'KPI created.');
    }

    public function show(Kpi $kpi)
    {
        return view('kpis.show', compact('kpi'));
    }

    public function edit(Kpi $kpi)
    {
        return view('kpis.edit', compact('kpi'));
    }

    public function update(KpiRequest $request, Kpi $kpi)
    {
        $kpi->update($request->validated());
        return redirect()->route('kpis.index')->with('success', 'KPI updated.');
    }

    public function destroy(Kpi $kpi)
    {
        // case_records.kpi_id uses restrictOnDelete, so a KPI that is
        // used in a case cannot be deleted. Show a friendly message instead of a crash.
        try {
            $kpi->delete();
        } catch (QueryException $e) {
            return redirect()->route('kpis.index')
                ->with('error', 'This KPI is used in a case and cannot be deleted.');
        }

        return redirect()->route('kpis.index')->with('success', 'KPI deleted.');
    }
}
