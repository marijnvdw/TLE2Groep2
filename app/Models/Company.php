<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies'; // Specify the table name
    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'city',
        'company_code'
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
