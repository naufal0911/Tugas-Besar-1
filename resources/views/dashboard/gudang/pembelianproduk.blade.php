@extends('dashboard.layouts.main')
@section('container')
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                  <h1 class="mt-4" style="margin-bottom: 40px">Pembelian Produk</h1>
                  <div class="card mb-4">
                    <div class="card-header"><i class="fa-solid fa-warehouse"></i>
                        Pembelian Produk Ke Gudang
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        <form action="{{ url('/Dashboard/pembelianproduk') }}" method="POST" >
                          @csrf
                            <div class="form-group">
                                <label for="ProductID"> <strong>Product ID</strong> </label>
                                <select class="form-select mb-3" aria-label="Default select example" name="productID">
                                    <option disabled selected value> -- Pilih ProductID -- </option>
                                   @foreach ($product as $item) 
                                      <option value="{{ $item->seri }}">{{ $item->seri }}</option>
                                   @endforeach
                                </select>
                              @error('productID')
                              <span class="invalid-feedback mb-2" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="datereceived"> <strong> Tanggal Diterima </strong></label>
                              <input type="date" class="form-control mb-3 @error('datereceived') is-invalid @enderror" style="width: 50%" name="datereceived" placeholder="Masukkan Tanggal Diterima" value="{{ old('datereceived') }}" required>
                              @error('datereceived')
                              <span class="invalid-feedback mb-2" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="jumlah"> <strong> Jumlah Barang </strong></label>
                              <input type="number" step="0.5" class="form-control mb-3 @error('jumlah') is-invalid @enderror" name="jumlah" style="width: 50%" aria-describedby="jumlahHelp" placeholder="Masukkan Jumlah Barang /Lusin" value="{{ old('jumlah') }}" required>
                              @error('jumlah')
                              <span class="invalid-feedback mb-2" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="supplier"> <strong> Supplier </strong> </label>
                                <input type="text" class="form-control mb-3 @error('supplier') is-invalid @enderror" name="supplier" aria-describedby="supplierHelp" placeholder="Masukkan Nama Supplier" value="{{ old('supplier') }}" required>
                                @error('supplier')
                                <span class="invalid-feedback mb-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                </main>
        @endsection
