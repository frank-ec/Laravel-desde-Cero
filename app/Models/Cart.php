<?php
namespace App\Models;
use App\Models\Product;       // Importa la definicion Payment
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Cart extends Model
{
    use HasFactory;
        // Relacion tabla pivote
        public function products()
        {
            return $this->belongsToMany(Product::class)->withPivot('quantity');
        }
}
