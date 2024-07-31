<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'slug',
        'type_id'
        // Agrega aquí otros campos que deban ser asignados masivamente
    ];
    public function Type()
    {
        return $this->belongsTo(Type::class);
    }
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
    protected static function booted()
    {
        static::deleting(function ($project) {
            $project->technologies()->detach();
        });
    }

}
