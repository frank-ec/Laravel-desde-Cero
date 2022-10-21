<?php

namespace App\Models;
use App\Models\Cart;       // Importa la definicion de carrito
use App\Models\Order;       // Importa la definicion de order
use App\Models\Image;       // Importa la definicion de order
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // Atributos de producto
    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'status',
    ];

    // Relacion modelo orden a  modelo user
    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    } 
    // V61 relaciones polimorficas un producto puede tener varias imagenes       
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
