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
        'total',
        'expired_at',
        'reff_id',
        'deposit_id',
        'esim_stock_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withPivot(['price', 'quantity']);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function esimStock()
    {
        return $this->belongsTo(ProductStock::class, 'esim_stock_id');
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
