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

    public function getImoveis(string $search = null)
    {
        $imoveis = $this->where(function ($query) use ($search) {
            if($search){
                $query->where('city', 'LIKE',  "%{$search}%");
                $query->orWhere('state', 'LIKE', "%{$search}%");
                $query->orWhere('price', 'LIKE', "%{$search}%");
                $query->orWhere('purpose', 'LIKE', "%{$search}%");
            }
        })->paginate(6);

        return $imoveis;
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Images()
    {
        return $this->hasMany(Image::class);
    }
}