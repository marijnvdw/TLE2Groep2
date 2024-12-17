<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationApplicantCount extends Model
{
    use HasFactory;

    protected $fillable = ['application_id', 'applicants_count'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
