@extends('layouts.app')

@section('content')
<section id="home">
    <header class="masthead d-flex align-items-center">
    <div class="container  px-lg-5 text-center">
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
          </div>
          @elseif (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
        <h1 style="margin-bottom:20px;">Most Label</h1>
        <a class="btn btn-outline-primary btn-xl" href="#info" style="margin-bottom:200px;">Info</a>
        <a class="btn btn-outline-success btn-xl" data-toggle="modal" data-target="#exampleModal" style="margin-bottom:200px; margin-left:50px;">Login</a>
        <a class="btn btn-outline-danger btn-xl" data-toggle="modal" data-target="#forgotpassword" style="margin-bottom:200px; margin-left:50px;">Forgot Password</a>
    </div>
          {{-- Modal Forgot Password --}}
          <div class="modal fade" id="forgotpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
                  <button type="button" class="btn-close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control mb-3 @error('email') is-invalid @enderror" name="email" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="invalid-feedback mb-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                                <button type="submit" class="btn btn-outline-success">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                    </form>
                </div>
              </div>
            </div>
      </div>
      {{-- End Modal Forgot Password --}}
    {{-- Modal Login --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login</h5>
              <button type="button" class="btn-close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/Login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-4 mb-2 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control mb-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email"  autocomplete="email" autofocus required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 mb-3 col-form-label text-md-right">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password"  autocomplete="current-password" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-outline-success">
                                Login
                            </button>
                            
                            </button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>



</header>
</section>
<section id="info" class="content-section bg-dark"">
    <div class="container px-4 px-lg-5 text-center">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-10">
                <h2>MOST LABEL</h2>
                <p class="lead mb-5">
                    Merupakan Sebuah Web Yang Disediakan Untuk Mengecek Stok Barang yang ada di Gudang dan Toko Kami
                </p>
                <a class="btn btn-light btn-xl" href="#services">Kegunaan</a>
            </div>
        </div>
    </div>
</section>
<section class="content-section bg-primary text-white text-center" id="services">
    <div class="container px-4 px-lg-5">
        <div class="content-section-heading">
            <h3 class="text-secondary mb-0">Kegunaan</h3>
            <h2 class="mb-5">Kegunaan SIPKL</h2>
        </div>
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="bi bi-file-pdf"></i></span>
                <h4><strong>Cetak Nilai</strong></h4>
                <p class="text-faded mb-0">Bisa Mencetak Nilai</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="bi bi-pencil-fill"></i></span>
                <h4><strong>Laporan</strong></h4>
                <p class="text-faded mb-0">Mencatat Kagiatan Kerja Lapangan</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="bi bi-sunglasses"></i></span>
                <h4><strong>Guru</strong></h4>
                <p class="text-faded mb-0">
                    Membantu Guru Untuk Memantau Siswa Yang Sedang PKL
                </p>
            </div>
            <div class="col-lg-3 col-md-6">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="bi bi-question-circle-fill"></i></span>
                <h4><strong>Pertanyaan</strong></h4>
                <p class="text-faded mb-0">Silakan Kontak Kami Jika Ada Pertanyaan</p>
            </div>
        </div>
    </div>
</section>
<button onclick="topFunction()" id="myBtn" title="Go to top">Back To Top</button>
    <script>
     
    // fungsi ketika user men scroll ke bawah 20 px maka tombol back to top akan muncul
     
    window.onscroll = function() {scrollFunction()};
     
     
    function scrollFunction() {
     
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
     
            document.getElementById("myBtn").style.display = "block";
     
        } else {
     
            document.getElementById("myBtn").style.display = "none";
     
        }
     
    }
     
    // fungsi ketika user meng klik tombol back to top maka halaman akan menscroll ke atas
     
     
    function topFunction() {
     
        document.body.scrollTop = 0;
     
        document.documentElement.scrollTop = 0;
     
    }
     
    </script>
@endsection
