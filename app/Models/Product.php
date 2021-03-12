<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    public $primaryKey = 'id';

    protected  $fillable = [
        'product_name',
        'src',
        'description',
        'status',
        'inventory',
        'price',
        'id_category',
        'created_at',
        'updated_at',
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class, 'images')->withPivot('id_product');
    }
}
