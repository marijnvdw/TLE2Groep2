<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'creation_date',
        'title',
        'description',
        'employment',
        'drivers_licence',
        'adult',
        'image',
        'details',
    ];

    public $timestamps = false; // Disable automatic timestamps (created_at, updated_at)
}
