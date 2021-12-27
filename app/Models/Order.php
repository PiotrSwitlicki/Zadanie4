<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

	protected $table = 'zamowienia';
	protected $fillable = [
        'id',
        'numer_zmowienia',
        'data',
        'ilosc',
        'id_produkt',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'id_produkt');
    }

    public function group()
    {
        return $this->hasOne(Group::class, 'id', 'id_grupa');
    }
}
