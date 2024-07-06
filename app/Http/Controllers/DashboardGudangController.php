<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\GudangPurchases;
use App\Models\Gudang;
use App\Models\GudangOrders;
use App\Models\Toko;
use App\Models\TokoPurchases;
use Illuminate\Support\Facades\File;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *   title="My API",
 *   version="1.0.0",
 *   description="API Documentation"
 * )
 */

class DashboardGudangController extends Controller
{
    public function pembelianprodukpost(Request $request){
        $this->validate($request, [
            'productID' => 'required|numeric',
            'datereceived' => 'required|date',
            'jumlah' => 'required|numeric',
            'supplier' => 'required',
        ]);
        $gudangpurchases = GudangPurchases::create([
            'productID' => $request->productID,
            'datereceived' => $request->datereceived,
            'supplier' => $request->supplier,
            'jumlah' => $request->jumlah
        ]);
        $getquantity = Gudang::where('productID', $request->productID)->first();
        $jumlahquantity = $getquantity->quantity + $request->jumlah;
        $jumlahavailable =  $getquantity->available + $request->jumlah;
        $gudang = Gudang::where('productID', $request->productID)->update([
            'quantity' => $jumlahquantity,
            'available' => $jumlahavailable
        ]);
        return redirect('/Dashboard/pembelianproduk')->with('success', 'Pembelian Produk Berhasil!');
    }
    
    public function pembelianproduk(){
        $product = Product::all();
        return view('dashboard.gudang.pembelianproduk', compact('product'), [
            'title' => 'Pembelian Produk',
            'active' => 'Daftar user'
        ]);
    }
    
    public function daftarpembelianproduk(){
        $gudangpurchases = GudangPurchases::all();
        
        return view('dashboard.gudang.daftarpembelianproduk', compact('gudangpurchases'), [
            'title' => 'Daftar Pembelian Produk',
            'active' => 'Daftar user'
        ]);
    }

    public function daftarpemesananproduk(){
        $gudangorders = GudangOrders::all();
        
        return view('dashboard.gudang.daftarpemesananproduk', compact('gudangorders'), [
            'title' => 'Daftar Pemesanana Produk',
            'active' => 'Daftar user'
        ]);
    }

    public function pemesananproduk(){
        $product = Gudang::where('available', '>', '0')->get();
        return view('dashboard.gudang.pemesananproduk', compact('product'), [
            'title' => 'Pemesanan Produk',
            'active' => 'Daftar user'
        ]);
    }
    
    public function pemesananprodukpost(Request $request){
        $this->validate($request, [
            'productID' => 'required|numeric',
            'dateshipped' => 'required|date',
            'jumlah' => 'required|numeric',
        ]);
        $getquantity = Gudang::where('productID', $request->productID)->first();
        if ($getquantity->available < $request->jumlah) {
            return redirect('/Dashboard/pemesananproduk')->with('error', 'Pemesanan Produk Gagal, Stok Barang Kurang!');
        } else {
            $gudangorders = GudangOrders::create([
                'productID' => $request->productID,
                'dateshipped' => $request->dateshipped,
                'jumlah' => $request->jumlah
            ]);
            $tokopurchases = TokoPurchases::create([
                'productID' => $request->productID,
                'datereceived' => $request->dateshipped,
                'jumlah' => $request->jumlah
            ]);

            $getquantityy = Toko::where('productID', $request->productID)->first();
            $jumlahquantityy = $getquantityy->quantity + $request->jumlah;
            $jumlahavailablee =  $getquantityy->available + $request->jumlah;
            $jumlahquantity = $getquantity->quantity - $request->jumlah;
            $jumlahavailable =  $getquantity->available - $request->jumlah;
            $jumlahsold =  $getquantity->sold + $request->jumlah;

            $tokos = Toko::where('productID', $request->productID)->update([
                'quantity'=> $jumlahquantityy,
                'available' => $jumlahavailablee
            ]);
            $gudang = Gudang::where('productID', $request->productID)->update([
                'sold' => $jumlahsold,
                'available' => $jumlahavailable
            ]);
            return redirect('/Dashboard/pemesananproduk')->with('success', 'Pemesanan Produk Berhasil!');
        }
    }
    
    public function stokgudang(){
        $gudang = Gudang::where('quantity', '>', '0')->get();
        return view('dashboard.gudang.stokgudang', compact('gudang'), [
            'title' => 'Stok Gudang',
            'active' => 'Daftar user'
        ]);
    }
    
    public function stoktoko(){
        $toko = Toko::where('quantity', '>', '0')->get();
        return view('dashboard.toko.stoktoko', compact('toko'), [
            'title' => 'Stok Toko',
            'active' => 'Daftar user'
        ]);
    }
    
    public function destroy($id)
    {
        $gudangorder = GudangOrders::findOrFail($id);
        $gudangorder->delete();

        return redirect('/Dashboard/gudang/daftarpemesananproduk')->with('success', 'Pemesanan Produk berhasil dihapus!');
    }

/**
 * @OA\Get(
 *      path="/api/products",
 *      summary="Menampilkan semua produk.",
 *      tags={"Products"},
 *      @OA\Response(
 *          response=200,
 *          description="Daftar produk berhasil ditampilkan",
 *          @OA\JsonContent(
 *              @OA\Property(property="success", type="boolean", example=true),
 *              @OA\Property(property="data", type="array", @OA\Items(
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="bahan", type="string", example="example"),
 *                  @OA\Property(property="model", type="string", example="example"),
 *                  @OA\Property(property="warna", type="string", example="example"),
 *                  @OA\Property(property="seri", type="string", example="example")
 *              ))
 *          )
 *      )
 * )
 */


 public function index()
 {
     $products = Product::all();
     
     return response()->json([
         'success' => true,
         'data' => $products
     ]);
 }

/**
 * @OA\Get(
 *      path="/api/products/{id}",
 *      summary="Menampilkan detail produk berdasarkan ID.",
 *      tags={"Products"},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="ID dari produk yang akan ditampilkan",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Detail produk berhasil ditampilkan",
 *          @OA\JsonContent(
 *              @OA\Property(property="success", type="boolean", example=true),
 *              @OA\Property(property="data", type="object", @OA\Property(
 *                  property="id", type="integer", example=1
 *              )),
 *          )
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Produk tidak ditemukan",
 *          @OA\JsonContent(
 *              @OA\Property(property="success", type="boolean", example=false),
 *              @OA\Property(property="message", type="string", example="Produk tidak ditemukan")
 *          )
 *      )
 * )
 */
public function show($id)
{
    $product = Product::find($id);
    
    if (!$product) {
        return response()->json([
            'success' => false,
            'message' => 'Produk tidak ditemukan'
        ], 404);
    }
    
    return response()->json([
        'success' => true,
        'data' => $product
    ]);
}

}
