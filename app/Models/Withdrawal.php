<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $fillable = [
        'user_id',
        'transaction_id',
        'reference_id',
        'amount',
        'fee',
        'total_deducted',
        'status',
    ];
}
