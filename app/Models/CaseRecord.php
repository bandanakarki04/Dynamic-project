<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseRecord extends Model
{
    protected $fillable = [
    'client_name',
    'problem_id',
    'solution_id',
    'kpi_id',
    'notes',];
    
    public function kpi()
    {
        return $this->belongsTo(Kpi::class);
    }


    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }

    public function solution()
    {
        return $this->belongsTo(Solution::class);
    }

}
