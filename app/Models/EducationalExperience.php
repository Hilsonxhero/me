<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'label',
        'location',
    ];
}
