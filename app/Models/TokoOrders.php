<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\toko_detail;

class TokoOrders extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function toko_detail()
    {
        return $this->hasMany(toko_detail::class);
    }
}
