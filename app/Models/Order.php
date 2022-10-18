<?php

namespace App\Models;
use App\Models\Payment;       // Importa la definicion de user
use App\Models\User;       // Importa la definicion de user
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
    // Relacion modelo orden a  modelo pago
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    // Relacion modelo orden a  modelo user
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }


}
