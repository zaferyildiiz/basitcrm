<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey="product_id";
    protected $fillable = [
        'product_name',
        'product_code',
        'product_category_id',
        'product_brand_id',
        'buying_price',
        'product_old_price',
        'product_price',
        'description',
        'stock_quantity',
        'stock_type',
        'stock_alert_level',
        'status',
        'image_json',
        'is_installment',
        'max_installment_number',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
        'company_id',
        // Diğer tüm sütunları da buraya ekleyin
    ];

    public function brands() {
        return $this->hasMany(ProductBrand::class,'product_brand_id', 'product_brand_id');
    }
}
