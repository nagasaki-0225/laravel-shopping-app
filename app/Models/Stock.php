<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'item_unit',
        'price',
        'shop_name',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function dishes() {
        return $this->belongsToMany(Dish::class)->withTimestamps();
    }    
}
