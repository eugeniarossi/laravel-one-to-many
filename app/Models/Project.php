<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'content']; // aggiornerà title e content

    protected $guarded = ['slug', 'image']; // aggiornerà tutto tranne lo slug e l'immagine
}
