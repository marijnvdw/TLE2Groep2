<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'employment',
        'drivers_licence',
        'adult',
        'image',
        'details',
        'creation_date',
        'company_id',
    ];

    public $timestamps = false; // Disable automatic timestamps (created_at, updated_at)
}
