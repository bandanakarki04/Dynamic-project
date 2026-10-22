<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    // Only these fields can be mass-assigned (A security review checks this)
    protected $table = 'sf_tags';
    protected $fillable = ['name'];

    // Many-to-many with Product (D pivot table: product_tag)
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
