@extends('dashboard.layouts.main')
@section('container')
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">PRODUK</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Seluruh Daftar Produk</li>
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
                            <i class="fas fa-table me-1"></i>
                            Daftar Produk
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                          <table id="table_id" class="table table-striped" style="width:100%">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Bahan</th>
                                  <th scope="col">Nama Model</th>
                                  <th scope="col">Nomor Seri</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                            <?php $no=1;?>
                            
                              <tbody>
                                <tr>
                                  @foreach ($product as $item)
                                  <td>{{ $no++ }}</td>
                                  <td>{{ $item->bahan }}</td>
                                  <td>{{ $item->model }}</td>
                                  <td>No. {{ $item->seri }}</td>
                                  <td>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#edit{{$item->id }}"><span class="badge bg-warning"><i class="bi bi-pencil"></i></span></a>
                                  </td>
                                </tr>
                                                                 {{-- Modal Edit --}}
                                                                 <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                  <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                          <form method="POST" action="{{ url('/Dashboard/proseseditproduct') }}">
                                                                              @csrf
                                                                              <input type="hidden" name="id" value="{{ $item->id }}">
                                                                                <div class="form-group">
                                                                                  <label for="nama_aktivitas">Nama Bahan</label>
                                                                                  <input type="text" name="bahan" class="form-control mb-3" value="{{ $item->bahan }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                  <label for="nama_aktivitas">Nama Model</label>
                                                                                  <input type="text" name="model" class="form-control mb-3" value="{{ $item->model }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                  <label for="nama_aktivitas">Warna</label>
                                                                                  <input type="text" name="warna" class="form-control mb-3" value="{{ $item->warna }}">
                                                                                </div>
                                                                                    <button type="submit" class="btn btn-outline-success">
                                                                                      Edit
                                                                                  </button>
                                                                              </div>
                                                                          </form>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                            </div>
                                                  {{-- END MODAL Edit --}}
                                  @endforeach
                              </tbody>
                            </table>
                        </div>
                          </div>
                        </div>
                    </main>
        @endsection
