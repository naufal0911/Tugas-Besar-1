<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\TokoOrders;
use App\Models\toko_detail;
use Illuminate\Support\Facades\DB;

class DashboardTokoController extends Controller
{
    public function pemesananproduk(){
        $product = Toko::where('available', '>', '0')->get();
        return view('dashboard.toko.pemesananproduk', compact('product'), [
            'title' => 'Daftar Pemesanan Produk',
            'active' => 'Daftar user'
        ]);
    }
    public function pemesananprodukpost(Request $request){
        $this->validate($request, [
            'dateshipped' => 'required|date',
            'customer' => 'required',
        ]);
    
        // Start database transaction
        DB::beginTransaction();
        
        try {
            $tokoorders = TokoOrders::create([
                'dateshipped' => $request->dateshipped,
                'customer' => $request->customer
            ]);
    
            $toko_id = $tokoorders->id;
    
            foreach($request->productIDD as $k => $v) {
                // Check the available quantity first
                $getquantity = Toko::where('productID', $v)->first();
                $jumlahavailable =  $getquantity->available;
                $jumlahrequested = $request->jumlah_detail[$k];
    
                if ($jumlahrequested > $jumlahavailable) {
                    // Rollback the transaction
                    DB::rollBack();
                    return redirect('/Dashboard/toko/pemesananproduk')->with('error', 'Pemesanan Produk Gagal, Stok Barang Kurang!');
                }
    
                // Insert into toko_details
                $tokoDetail = new toko_detail();
                $tokoDetail->toko_orders_id = $toko_id;
                $tokoDetail->productID = $v;
                $tokoDetail->jumlah = $jumlahrequested;
                $tokoDetail->save();
    
                // Update the Toko quantities
                $jumlahavailable -= $jumlahrequested;
                $jumlahsold = $getquantity->sold + $jumlahrequested;
    
                Toko::where('productID', $v)->update([
                    'sold' => $jumlahsold,
                    'available' => $jumlahavailable
                ]);
            }
    
            // Commit the transaction
            DB::commit();
    
            return redirect('/Dashboard/toko/pemesananproduk')->with('success', 'Penjualan Produk Berhasil!');
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();
            return redirect()->back()->withErrors(['Terjadi kesalahan saat memproses pesanan.']);
        }
    }
    public function daftarpenjualanproduk(){
        $tokoorders = TokoOrders::all();
        $tokodetail = toko_detail::all();
        
        return view('dashboard.toko.daftarpenjualanproduk', compact('tokoorders', 'tokodetail'), [
            'title' => 'Daftar Penjualan Produk',
            'active' => 'Daftar user'
        ]);
    }
    public function detailpenjualanproduk(){
        $tokoorders = TokoOrders::all();
        
        return view('dashboard.toko.detailpenjualanproduk',[
            'title' => 'Detail Penjualan Produk',
            'active' => 'Daftar user'
        ]);
    }
    public function detail($id){
        $tokoorders = TokoOrders::where('id', '=', $id)->get();
        $tokodetail = toko_detail::where('toko_orders_id', '=', $id)->get();
        
        return view('dashboard.toko.detail', compact('tokodetail','tokoorders'),[
            'title' => 'Detail Penjualan',
            'active' => 'Daftar user'
        ]);
    }
    public function getProductDetails($productID) {
        // Get product details using the relationship
        $product = Toko::with('product')->where('productID', $productID)->first();
        return response()->json($product);
    }

}
