<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    public $primaryKey = 'id';

    protected  $fillable = [
        'category',
        'description',
        'active',
        'created_at',
        'updated_at',
    ];
}
