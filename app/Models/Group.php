<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{	
    use HasFactory;
    protected $table = 'grupy_produktow';
    protected $fillable = [
        'id',
        'nazwa',
    ];

   	public function orders()
    {
        return $this->belongsTo(Order::class, 'id_grupa', 'id');
    }
}
