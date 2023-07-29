<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    protected $fillable = ['title', 'description', 'thumbnail'];
    
    // Add any additional properties or relationships here

}
