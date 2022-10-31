<?php

namespace App\Models;
use App\Models\Image;       // Importa la definicion de pagos
use App\Models\Order;       // Importa la definicion de order
use App\Models\Payment;       // Importa la definicion de pagos
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        //'admin_since',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * The attributes that should be mutated  to dates
     *
     * @var array
     */
    protected $dates = [
        'admin_since',
    ];
    // V57 Relacion modelo user a  modelo order
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
    //V59 Relacion user - order -  pagos
    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Order::class, 'customer_id');
    }
    //V60 Polomorfica Un usuario tiene una imagen
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    
    
}
