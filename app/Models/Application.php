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
        'company_id',
        'sector',
    ];

    public static function findOrFail(array $applicationId)
    {
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public $timestamps = false; // Disable automatic timestamps (created_at, updated_at)

    // Application.php
    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function applicantCount()
    {
        return $this->hasOne(ApplicationApplicantCount::class);
    }


}

