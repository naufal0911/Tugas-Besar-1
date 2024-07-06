@extends('dashboard.layouts.main')
@section('container')
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                  <h1 class="mt-4" style="margin-bottom: 40px">Pendaftaran User</h1>
                  <div class="card mb-4">
                    <div class="card-header">
                        Formulir Pendaftaran User
                    </div>
                    <div class="card-body">
                      @if (session()->has('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif
                        <form action="{{ url('/Register') }}" method="POST" >
                          @csrf
                            <div class="form-group">
                              <label for="name"> <strong>Nama User</strong> </label>
                              <input type="text" class="form-control mb-3 @error('name') is-invalid @enderror" name="name" placeholder="Masukkan Nama User" value="{{ old('name') }}" required>
                              @error('name')
                              <span class="invalid-feedback mb-2" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="username"> <strong>Username</strong> </label>
                              <input type="text" class="form-control mb-3 @error('username') is-invalid @enderror" name="username" placeholder="Masukkan Username User" value="{{ old('username') }}" required>
                              @error('username')
                              <span class="invalid-feedback mb-2" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="email_user"> <Strong>Email User</Strong> </label>
                              <input type="email" class="form-control mb-3 @error('email') is-invalid @enderror" name="email" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email" value="{{ old('email') }}" required>
                              @error('email')
                              <span class="invalid-feedback mb-2" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"> <Strong>Password User</Strong> </label>
                                <input type="password" class="form-control mb-3 @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password" required>
                                @error('password')
                                <span class="invalid-feedback mb-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            <div class="form-group">
                                <label for="role"> <Strong>Role</Strong> </label>
                                <select class="form-select mb-3" aria-label="Default select example" name="role">
                                    <option disabled selected value> -- Sebagai User -- </option>
                                    <option value="1">Admin</option>
                                    <option value="2">User Toko</option>
                                    <option value="3">User Gudang</option>
                                  </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                </main>
        @endsection
