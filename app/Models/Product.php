<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nazwa',
        'id_grupa',
        'cena_netto',
        'vat',
    ];

	protected $table = 'produkty';

	public function orders()
    {
        return $this->belongsTo(Order::class, 'id_produkt', 'id');
    }

    public function group()
    {
        return $this->hasOne(Group::class, 'id', 'id_grupa');
    }


}
