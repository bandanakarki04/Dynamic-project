<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Problem extends Model
{
    protected $fillable = ['name', 'description', 'area'];

    public function solutions(): BelongsToMany
    {
        return $this->belongsToMany(Solution::class);
    }
}