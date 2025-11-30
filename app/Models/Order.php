<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'name',
        'email',
        'whatsapp',
        'status',
        'delivery_status',
        'expired_at'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withPivot(['price', 'quantity']);
    }

    // Assign eSIM stock after payment success
    public static function assignEsimToUser($userId, $productId)
    {
        $stock = \App\Models\ProductStock::where('product_id', $productId)
            ->where('status', 'available')
            ->first();
        if ($stock) {
            $stock->assignToUser($userId);
            return $stock;
        }
        return null;
    }
}
