<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function dishes() {
        return $this->belongsToMany(Dish::class)->withTimestamps();
    }    
}
