@extends('dashboard.layouts.main')
@section('container')
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Stok Toko</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Seluruh Stok Toko</li>
                        </ol>
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        <div class="card mb-4">
                          <div class="card-header">
                            <i class="fa-solid fa-shop"></i>
                            Stok Toko
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_id" class="table table-striped" style="width:100%">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nomor Seri</th>
                                  <th scope="col">Kuantitas</th>
                                  <th scope="col">Tersedia</th>
                                  <th scope="col">Terjual</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                            <?php $no=1;?>
                            
                              <tbody>
                                <tr>
                                  @foreach ($toko as $item)
                                  <td>{{ $no++ }}</td>
                                  <td>No. {{ $item->productID }}</td>
                                  <td>{{ $item->quantity }} Lusin</td>
                                  <td>{{ $item->available }} Lusin</td>
                                  <td>{{ $item->sold }} Lusin</td>
                                  <td>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#detail{{$item->id }}"><span class="badge bg-primary"><i class="bi bi-eye"></i></span></a>
                                  </td>
                                </tr>
                                      </div>
                                    </div>
                                  </div>
                                  {{-- Modal Detail --}}
                                              <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Detail Stok Gudang</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                              <div class="form-group">
                                                                <label for="nama_aktivitas">Product ID</label>
                                                                <input type="text"  class="form-control mb-3" value="No. {{ $item->productID }}" disabled>
                                                              </div>
                                                              <div class="form-group">
                                                                <label for="nama_aktivitas">Kuantitas</label>
                                                                <input type="text" class="form-control mb-3" value="{{ $item->quantity*12 }} buah" disabled>
                                                              </div>
                                                              <div class="form-group">
                                                                <label for="nama_aktivitas">Tersedia</label>
                                                                <input type="text"  class="form-control mb-3" value="{{ $item->available*12 }} buah" disabled>
                                                              </div>
                                                              <div class="form-group">
                                                                <label for="nama_aktivitas">Terjual</label>
                                                                <input type="text" class="form-control mb-3" value="{{ $item->sold*12 }} buah" disabled>
                                                              </div>
                                                            </div>
                                                    </div>
                                                  </div>
                                                </div>
                                          </div>
                                {{-- END MODAL Detail --}}
                                  @endforeach
                              </tbody>
                            </table>
                        
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Seluruh Stok Gudang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="table-responsive">
                        </div>
                          </div>
                        </div>
                    </main>
        @endsection
