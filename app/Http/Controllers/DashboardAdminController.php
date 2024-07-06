<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Gudang;
use App\Models\GudangOrders;
use App\Models\GudangPurchases;
use App\Models\Toko;
use App\Models\toko_detail;
use App\Models\TokoDetail;
use App\Models\TokoOrders;
use App\Models\TokoPurchases;
use Illuminate\Support\Facades\Auth; 

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function daftaruser(){
        $guru = User::get();
        return view('dashboard.admin.daftaruser', compact('guru'), [
            'title' => 'Daftar User',
            'active' => 'daftar guru'
        ]);
    }

    public function masteruser(){
        $guru = User::get();
        return view('dashboard.admin.masteruser', compact('guru'), [
            'title' => 'Daftar User',
            'active' => 'daftar guru'
        ]);
    }

    public function daftarproduk(){
        $product = Product::get();
        return view('dashboard.admin.daftarproduct', compact('product'), [
            'title' => 'Daftar Produk',
            'active' => 'daftar guru'
        ]);
    }

    public function masterproduct(){
        $product = Product::get();
        return view('dashboard.admin.masterproduct', compact('product'), [
            'title' => 'Daftar Produk',
            'active' => 'daftar guru'
        ]);
    }

    public function pendaftaranuser(){
        return view('dashboard.admin.pendaftaranuser', [
            'title' => 'Daftar Pendaftaran User',
            'active' => 'Daftar user'
        ]);
    }

    public function pendaftaranproduk(){
        return view('dashboard.admin.pendaftaranproduk', [
            'title' => 'Daftar Pendaftaran Produk',
            'active' => 'Daftar user'
        ]);
    }

    public function pendaftaranproduksimpan(Request $request){
        $this->validate($request, [
            'bahan' => 'required|min:4|max:255',
            'model' => 'required|min:4|max:20',
            'warna' => 'required|min:4|max:20',
            'seri' => 'required|numeric|unique:products,seri',
        ]);
        
        $gudang = Gudang::create([
            'productID' => $request->seri,
            'sold' => 0,
            'quantity' => 0,
            'available' => 0
        ]);

        $toko = Toko::create([
            'productID' => $request->seri,
            'sold' => 0,
            'quantity' => 0,
            'available' => 0
        ]);

        $product = Product::create([
            'bahan' => $request->bahan,
            'model' => $request->model,
            'warna' => $request->warna,
            'seri' => $request->seri,
            'gudang_id' => $gudang->id
        ]);
    }
    
    public function prosesaddproduct(Request $request){
        $this->validate($request, [
            'bahan' => 'required|min:4|max:255',
            'model' => 'required|min:4|max:255',
            'warna' => 'required|min:4|max:255',
            'seri' => 'required|numeric|unique:products,seri',
        ]);
        
        $gudang = Gudang::create([
            'productID' => $request->seri,
            'sold' => 0,
            'quantity' => 0,
            'available' => 0
        ]);
    
        $toko = Toko::create([
            'productID' => $request->seri,
            'sold' => 0,
            'quantity' => 0,
            'available' => 0
        ]);
    
        $product = Product::create([
            'bahan' => $request->bahan,
            'model' => $request->model,
            'warna' => $request->warna,
            'seri' => $request->seri,
            'gudang_id' => $gudang->id
        ]);
        // Mendapatkan email pengguna yang sedang login
        $userEmail = Auth::user()->email;
        // Prepare details for email
        $details = [
            'title' => 'Produk ' . $request->seri . ' Berhasil Ditambahkan!',
            'bahan' => $request->bahan,
            'model' => $request->model,
            'warna' => $request->warna,
            'seri' => $request->seri,
        ];
        // Tentukan subject dan view dari controller
        $subject = 'Mail From SIMBAR';
        $view = 'dashboard.admin.mail'; // Sesuaikan dengan view yang Anda inginkan
        // Send email
        Mail::to($userEmail)->send(new MyTestMail($details, $subject, $view));
    
        return redirect('/Dashboard/master/daftarproduk')->with('success', 'Pendaftaran Produk Berhasil!');
    }

    public function proseshapusproduct(Request $request){
        $id = $request->id;

        // Hapus data dari model Product
        $product = Product::find($id);
        $product->delete();

        // Hapus data dari model Gudang
        Gudang::where('productID', $product->seri)->delete();

        // Hapus data dari model Gudang Orders
        GudangOrders::where('productID', $product->seri)->delete();

        // Hapus data dari model Gudang Purchases
        GudangPurchases::where('productID', $product->seri)->delete();

        // Hapus data dari model Toko Detail
        toko_detail::where('productID', $product->seri)->delete();

        // Hapus data dari model Toko
        Toko::where('productID', $product->seri)->delete();

        // Hapus data dari model Toko Orders
        //TokoOrders::where('productID', $product->seri)->delete();

        // Hapus data dari model Toko Purchases
        TokoPurchases::where('productID', $product->seri)->delete();

        return redirect('/Dashboard/master/daftarproduk')->with('success', 'Produk dan data terkait berhasil dihapus!');
    }

    public function prosesuserhapus(Request $request){
        $id = $request->id;
        $user = User::find($id);
        $user->delete();
        return redirect('/Dashboard/master/daftaruser')->with('success', 'Akun Berhasil di Hapus !');
    }

    public function prosesuseredit(Request $request){
        $id = $request->id;
        $user = User::where('id', $id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'group_id' => $request->role
        ]);
        return redirect('/Dashboard/master/daftaruser')->with('success', 'Akun Berhasil di Edit !');
    }

    public function proseseditproduct(Request $request){
        $id = $request->id;
        $product = Product::where('id', $id)->update([
            'bahan' => $request->bahan,
            'model' => $request->model,
            'warna' => $request->warna,
        ]);
        return redirect('/Dashboard/master/daftarproduk')->with('success', 'Produk Berhasil di Edit !');
    }


    public function stokgudang(){
        $gudang = Gudang::where('quantity', '>', '0')->get();
        return view('dashboard.gudang.stokgudang', compact('gudang'), [
            'title' => 'Daftar Stok Gudang',
            'active' => 'Daftar user'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
