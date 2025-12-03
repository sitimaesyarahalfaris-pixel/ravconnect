<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'flag_url',
        'image_url' // Add image_url for country header card
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_country', 'country_id', 'product_id');
    }
}
