<?php

namespace Shibly\TodoPackage\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'description', 'completed'];


    public function scopeCompleted($query)
    {
        return $query->where('completed', 1);
    }

    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }
}