<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $table = "dishes";
    protected $primaryKey = 'id';

    public function Category () {
        return $this->belongsTo(Category::class);
    }
}
