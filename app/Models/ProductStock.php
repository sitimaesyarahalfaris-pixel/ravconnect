<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'content',
        'type',
        'status',
        'user_id',
        'sku',
        'stock',
        'iccid',
        'activation_code',
        'smdp_plus',
        'qr_image_url'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignToUser($userId)
    {
        $this->user_id = $userId;
        $this->status = 'used';
        $this->save();
    }
}
