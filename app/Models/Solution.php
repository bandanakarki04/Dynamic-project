<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Solution extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category',
    ];

public function problems(): BelongsToMany
{
    return $this->belongsToMany(
        Problem::class,
        'problem_solution',
        'solution_id',
        'problem_id'
    );
}
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_solution');
    }
}