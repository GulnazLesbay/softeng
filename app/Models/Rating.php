<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Comment extends Model
{

    protected $fillable = ['rate', 'product_id'];

    use HasFactory;

    public function posts()
    {
        // көп коммент - 1 постка тиеслі
        return $this->belongsTo(Product::class);
    }

    public function users()
    {
        // 1 юзер - көп коммент

        return $this->hasMany(User::class);
    }
}
