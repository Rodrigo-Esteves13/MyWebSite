<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText; // Import the trait

class Project extends Model
{
    use HasFactory;
    use HasTrixRichText; // Use the trait

    protected $fillable = ['title', 'thumbnail', 'description']; // Make sure 'description' is in the fillable array

    public $timestamps = false;
    
    public function descriptionImages()
    {
        return $this->hasMany(ProjectDescriptionImage::class);
    }
}
