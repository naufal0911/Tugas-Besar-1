@extends('dashboard.layouts.main')
@section('container')
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                        <h1 class="mt-4" style="margin-bottom: 40px">Pendaftaran Produk</h1>
                        <div class="card mb-4">
                          <div class="card-header">
                              Formulir Pendaftaran Produk
                          </div>
                          <div class="card-body">
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        <form action="{{ url('/Dashboard/pendaftaranproduk') }}" method="POST" >
                          @csrf
                            <div class="form-group">
                              <label for="bahan"> <Strong>Nama Bahan</Strong> </label>
                              <input type="text" class="form-control mb-3 @error('bahan') is-invalid @enderror" name="bahan" placeholder="Masukkan Nama Bahan" value="{{ old('bahan') }}" required>
                              @error('bahan')
                              <span class="invalid-feedback mb-2" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="model"> <strong>Nama Model</strong> </label>
                              <input type="text" class="form-control mb-3 @error('model') is-invalid @enderror" name="model" placeholder="Masukkan Nama Model" value="{{ old('model') }}" required>
                              @error('model')
                              <span class="invalid-feedback mb-2" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="warna"> <Strong>Warna</Strong> </label>
                              <input type="text" class="form-control mb-3 @error('warna') is-invalid @enderror" name="warna" aria-describedby="warnaHelp" placeholder="Masukkan Nomor Warna" value="{{ old('warna') }}" required>
                              @error('warna')
                              <span class="invalid-feedback mb-2" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="seri"> <Strong>Seri</Strong> </label>
                              <input type="number" class="form-control @error('seri') is-invalid @enderror" style="margin-bottom: 20px" name="seri" aria-describedby="seriHelp" placeholder="Masukkan Nomor Seri" value="{{ old('seri') }}" required>
                              @error('seri')
                              <span class="invalid-feedback mb-2" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                          </div>
                        </div>
                    
                </main>
        @endsection
