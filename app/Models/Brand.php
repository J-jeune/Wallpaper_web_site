<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
#relations Eloquent
/*configurer chaque Model pour qu'ils "connaissent" leurs relations entre eux 
ça permettra d'écrire des choses comme $product->categories 
ou $order->products directement en PHP.
*/
class Brand extends Model
{
    protected $fillable = ['nom'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
