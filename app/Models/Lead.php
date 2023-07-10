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
        'cellPhone',
        'service',
        'serviceTypes',
        'country',
        'visas',
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
        'source',
        'medium',
        'term',
        'refer',
        'send_mail'
    ];

}
