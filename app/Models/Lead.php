<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_owner',
        'first_name',
        'last_name',
        'title',
        'company',
        'phone',
        'email',
        'website',
        'lead_source',
        'lead_status',
        'industry',
        'annual_revenue',
        'no_of_employees',
        'rating',
        'street',
        'city',
        'state',
        'zip_code',
        'country',
        'description',

    ];
}
