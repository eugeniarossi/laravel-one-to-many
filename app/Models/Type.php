<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    // un type può avere più progetti
    public function project()
    {
        return $this->hasMany(Project::class);
    }
}
