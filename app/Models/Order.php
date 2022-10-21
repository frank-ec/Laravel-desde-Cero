<?php

namespace App\Models;
use App\Models\Payment;       // Importa la definicion Payment
use App\Models\User;       // Importa la definicion de user
use App\Models\Product;       // Importa la definicion de user
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'customer_id',
    ];
    // V56 Relacion modelo orden a  modelo pago
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    // V57 Relacion modelo orden a  modelo user
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    // Relacion tabla pivote
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }


}
