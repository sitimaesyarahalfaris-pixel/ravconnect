<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'quota',
        'validity',
        'operator',
        'auto_delivery',
        'active'
    ];

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'product_country');
    }

    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }
}
