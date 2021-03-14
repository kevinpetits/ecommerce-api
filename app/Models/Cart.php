<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart_storage';

    protected $fillable = [
        'id', 'cart_data',
    ];

    public function setCartDataAttribute($value)
    {
        $this->attributes['cart_data'] = serialize(utf8_encode($value));
    }

    public function getCartDataAttribute($value)
    {
        $string = preg_replace_callback(
            '!s:(\d+):"(.*?)";!s',
            function ($matches) {
                if ( isset( $matches[2] ) )
                    return 's:'.strlen($matches[2]).':"'.$matches[2].'";';
            },
            $value
        );
        return unserialize($string);
    }
}
