<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_name',
        'product_description',
        'owner_id',
        'category_id',
        'product_price',
        'product_image'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
