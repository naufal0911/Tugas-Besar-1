<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gudang;
use App\Models\Toko;
use App\Models\GudangOrders;
use App\Models\GudangPurchases;
use App\Models\TokoOrders;
use App\Models\TokoPurchases;

class Dashboard extends Controller
{
    public function index(){
        $user = User::all();
        $stokgudang = Gudang::where('available', '>', '0')->sum('available');
        $stoktoko = Toko::where('available', '>', '0')->sum('available');
        $gudangorders = GudangOrders::all();
        $gudangpurchases = GudangPurchases::all();
        $tokoorders = TokoOrders::all();
        $tokopurchases = TokoPurchases::all();
        return view('dashboard.index', compact('user', 'stokgudang', 'stoktoko', 'gudangorders', 'gudangpurchases', 'tokoorders', 'tokopurchases'), [
            'title' => 'Dashboard',
            'active' => 'dashboard'
        ]);
    }
}
