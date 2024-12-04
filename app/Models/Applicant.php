<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'id',
        'email',
        'status',
        'application_id',
    ];
    public function setUpdatedAt($value)
    {
    }
    public function getUpdatedAtColumn()
    {
        return null;
    }

}
