<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'method',
        'amount',
        'status',
        'payment_url',
        'transaction_id',
        'qr_image',
        'qr_string',
        'bank',
        'tujuan',
        'atas_nama',
        'nomor_va',
        'tambahan',
        'expired_at'
    ];
}
