<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public function scopeOfTerm($query, $term)
    {
        return $query->where('name', 'LIKE', "%$term%");
    }
}
