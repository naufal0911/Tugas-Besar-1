@extends('dashboard.layouts.main')
@section('container')
@if (session()->has('login_berhasil'))
<div class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login</h5>
          <button type="button" class="btn-close" data-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            {{ session('login_berhasil') }}
        </div>
      </div>
    </div>
  </div>
@endif
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Selamat Datang {{ auth()->user()->name }} </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Hari Ini Tanggal {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y'); }}</li>
                        </ol>
                        @if (auth()->user()->group_id == 1)
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <a href="{{url('/Dashboard/daftaruser')}}" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #F7464A">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Data User 
                                    <div class="small" style="margin-left: 13%">{{ $user->count() }} User</div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="{{url('/Dashboard/stokgudang')}}" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #46BFBD">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Stok Gudang
                                    <div class="small" style="margin-left: 13%">{{ $stokgudang }} Lusin</div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="{{url('/Dashboard/stoktoko')}}" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #FDB45C">
                                    <div class="card-body"><i class="bi bi-house-door" style="margin-right: 5%"></i>Stok Toko
                                    <div class="small" style="margin-left: 13%">{{ $stoktoko }} Lusin</div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fa-solid fa-warehouse"></i>
                                        Ringkasan Data Gudang
                                    </div>
                                    <div class="card-body">
                                    <div>
                                         Total Pembelian Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp; {{$gudangpurchases->count()}} transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    <div>Total Penjualan Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&ensp; {{$gudangorders->count()}} transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    {{-- <div>Total Supplier {{$gudangpurchases->count()}}
                                        <hr size="5px" width="100%" align="left">
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fa-solid fa-shop"></i>
                                        Ringkasan Data Toko
                                    </div>
                                    <div class="card-body">
                                    <div>
                                         Total Pembelian Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp; {{$tokopurchases->count()}} transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    <div>Total Penjualan Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&ensp; {{$tokoorders->count()}} transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    {{-- <div>Total Supplier {{$gudangpurchases->count()}}
                                        <hr size="5px" width="100%" align="left">
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="bi bi-pie-chart-fill"></i>
                                        Perbandingan Stok Gudang dan Stok Toko (/Lusin)
                                    </div>
                                    <div class="card-body"><canvas id="chart-area" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="bi bi-bar-chart-line-fill"></i>
                                        Perbandingan Stok Gudang dan Stok Toko (/Buah)
                                    </div>
                                    <div class="card-body"><canvas id="chart-stok" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <script>
                            var chart = {
                                type: 'bar',
                                data: {
                                    datasets: [{
                                        data: [
                                            {{ $stokgudang * 12 }},
                                            {{ $stoktoko * 12 }},             
                                        ],
                                        label: "Buah",
                                        backgroundColor: [
                                            
                                            "#46BFBD",
                                            "#FDB45C",         
                                        ],
                                    }],
                                    labels: [
                                        "Stok Gudang",
                                        "Stok Toko",
                                    ]
                                },
                                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
                            };
                                var config = {
                                    type: 'pie',
                                    data: {    
                                        datasets: [{
                                            data: [
                                                {{ $stokgudang }},
                                                {{ $stoktoko }},
                                            ],
                                            backgroundColor: [                   
                                                "#46BFBD",
                                                "#FDB45C",
                                            ],
                                        }],
                                        labels: [
                                            "Stok Gudang",
                                            "Stok Toko",
                                        ]
                                    },
                                    options: {
                                        responsive: true
                                    }
                                };
                            
                                window.onload = function () {
                                var ctx = document.getElementById("chart-area").getContext("2d");
                                var ctxx = document.getElementById("chart-stok").getContext("2d");
                                var stok = new Chart(ctxx, chart);
                                var area = new Chart(ctx, config);
                            };

                                // var config = {
                                //     type: 'pie',
                                //     data: {
                                //         datasets: [{
                                //             data: [
                                //                 {{ $stokgudang }},
                                //                 {{ $stoktoko }},
                                          
                                                
                                //             ],
                                //             backgroundColor: [
                                                
                                //                 "#46BFBD",
                                //                 "#FDB45C",
                                                
                                //             ],
                                //         }],
                                //         labels: [
                                //             "Stok Gudang",
                                //             "Stok Toko",
                                            
                                           
                           
                                //         ]
                                //     },
                                //     options: {
                                //         responsive: true
                                //     }
                                // };
                                // window.onload = function() {
                                //     var ctx = document.getElementById("chart-area").getContext("2d");
                                //     var chart = new Chart(ctx, config);
                                // };
                            </script>
                        @elseif (auth()->user()->group_id == 3)
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <a href="{{url('/Dashboard/stokgudang')}}" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #46BFBD">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Stok Gudang
                                    <div class="small" style="margin-left: 13%">{{ $stokgudang }} Lusin</div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="{{url('/Dashboard/stoktoko')}}" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #FDB45C">
                                    <div class="card-body"><i class="bi bi-house-door" style="margin-right: 5%"></i>Stok Toko
                                    <div class="small" style="margin-left: 13%">{{ $stoktoko }} Lusin</div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fa-solid fa-warehouse"></i>
                                        Ringkasan Data Gudang
                                    </div>
                                    <div class="card-body">
                                    <div>
                                         Total Pembelian Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp; {{$gudangpurchases->count()}} transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    <div>Total Penjualan Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&ensp; {{$gudangorders->count()}} transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    {{-- <div>Total Supplier {{$gudangpurchases->count()}}
                                        <hr size="5px" width="100%" align="left">
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="bi bi-pie-chart-fill"></i>
                                        Perbandingan Stok Gudang dan Stok Toko (/Lusin)
                                    </div>
                                    <div class="card-body"><canvas id="chart-area" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <script>
                                var config = {
                                    type: 'pie',
                                    data: {    
                                        datasets: [{
                                            data: [
                                                {{ $stokgudang }},
                                                {{ $stoktoko }},
                                            ],
                                            backgroundColor: [                   
                                                "#46BFBD",
                                                "#FDB45C",
                                            ],
                                        }],
                                        labels: [
                                            "Stok Gudang",
                                            "Stok Toko",
                                        ]
                                    },
                                    options: {
                                        responsive: true
                                    }
                                };
                            
                                window.onload = function () {
                                var ctx = document.getElementById("chart-area").getContext("2d");
                                var area = new Chart(ctx, config);
                            };
                                                      </script>
                        @elseif (auth()->user()->group_id == 2)
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <a href="{{url('/Dashboard/stokgudang')}}" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #46BFBD">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Stok Gudang
                                    <div class="small" style="margin-left: 13%">{{ $stokgudang }} Lusin</div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="{{url('/Dashboard/stoktoko')}}" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #FDB45C">
                                    <div class="card-body"><i class="bi bi-house-door" style="margin-right: 5%"></i>Stok Toko
                                    <div class="small" style="margin-left: 13%">{{ $stoktoko }} Lusin</div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fa-solid fa-shop"></i>
                                        Ringkasan Data Toko
                                    </div>
                                    <div class="card-body">
                                    <div>
                                         Total Pembelian Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp; {{$tokopurchases->count()}} transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    <div>Total Penjualan Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&ensp; {{$tokoorders->count()}} transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    {{-- <div>Total Supplier {{$gudangpurchases->count()}}
                                        <hr size="5px" width="100%" align="left">
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="bi bi-pie-chart-fill"></i>
                                        Perbandingan Stok Gudang dan Stok Toko (/Lusin)
                                    </div>
                                    <div class="card-body"><canvas id="chart-area" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <script>
                            var config = {
                                type: 'pie',
                                data: {    
                                    datasets: [{
                                        data: [
                                            {{ $stokgudang }},
                                            {{ $stoktoko }},
                                        ],
                                        backgroundColor: [                   
                                            "#46BFBD",
                                            "#FDB45C",
                                        ],
                                    }],
                                    labels: [
                                        "Stok Gudang",
                                        "Stok Toko",
                                    ]
                                },
                                options: {
                                    responsive: true
                                }
                            };
                        
                            window.onload = function () {
                            var ctx = document.getElementById("chart-area").getContext("2d");
                            var area = new Chart(ctx, config);
                        };
                            
                                                      </script>
                        @endif





        @endsection
