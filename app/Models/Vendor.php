<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_owner',
        'vendor_name',
        'phone',
        'email',
        'website',
        'category',
        'gl_account',
        'email_opt_out',
        'street',
        'city',
        'state',
        'zip_code',
        'country',
        'description',
    ];
}
