<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TokoOrders;
use App\Models\Product;

class toko_detail extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function toko_orders()
    {
        return $this->belongsTo(TokoOrders::class);
    }
}
