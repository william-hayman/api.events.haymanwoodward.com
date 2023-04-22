<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'service',
        'migrateTo',
        'academicBackground',
        'timeExperience',
        'occupation',
        'annualIncome',
        'language',
        'formLink',
        'event',
        'imported',
        'utm',
        'refer',
        'send_mail'
    ];

}
