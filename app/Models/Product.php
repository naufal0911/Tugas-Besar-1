<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gudang;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function Product()
    {
        return $this->belongsTo(Gudang::class);
    }
}
