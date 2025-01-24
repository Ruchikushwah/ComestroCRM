<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'account_name',
        'email',
        'mobile',
        'assistant',
        'lead_source',
        'vendor_name',
        'title',
        'department',
        'date_of_birth',
        'asst_phone',
        'secondary_email',
        'reporting_to',
        'mailing_street',
        'mailing_city',
        'mailing_state',
        'mailing_pincode',
        'mailing_country',
        'other_street',
        'other_city',
        'other_state',
        'other_pincode',
        'other_country',
        'description',
    ];

    /**
     * Relationships
     */
}