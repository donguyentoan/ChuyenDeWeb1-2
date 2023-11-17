<?php


namespace App\Models;


use App\Models\User;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Like extends Model
{
    use HasFactory;


    protected $fillable = [
        "id_like",
        "id_product",
        "id_user",
    ];


    public function product()
    {
        return $this->belongsTo(Products::class, 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}




