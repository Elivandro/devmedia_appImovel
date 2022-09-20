<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'description',
        'address',
        'neighborhood',
        'number',
        'postal_code',
        'city',
        'state',
        'price',
        'roomQty',
        'type',
        'purpose',
        'user_id',
        'created_at',
        'updated_at',
    ];

    protected $table = 'imoveis';

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}