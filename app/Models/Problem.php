<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Problem extends Model
{
    protected $table = 'sf_problems';

    protected $fillable = [
        'name',
        'description',
        'area',
    ];

    public function solutions(): BelongsToMany
    {
        return $this->belongsToMany(
            Solution::class,
            'sf_problem_solution',
            'problem_id',
            'solution_id'
        );
    }
}
