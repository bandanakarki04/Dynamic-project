<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseRecord extends Model
{
    
    public function kpis()
    {
        return $this->belongsToMany(Kpi::class);
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
