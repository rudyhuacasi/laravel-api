<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
    protected static function booted()
    {
        static::deleting(function ($technology) {
            $technology->projects()->detach();
        });
    }
}
