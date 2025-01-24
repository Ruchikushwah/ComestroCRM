<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'quote_stage',
        'team',
        'carrier',
        'deal_name',
        'valid_until',
        'contact_name',
        'account_name',
        'billing_street',
        'billing_city',
        'billing_state',
        'billing_code',
        'billing_country',
        'shipping_street',
        'shipping_city',
        'shipping_state',
        'shipping_code',
        'shipping_country',
    ];
}
