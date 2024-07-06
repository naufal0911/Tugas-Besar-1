<?php $__env->startSection('container'); ?>
<?php if(session()->has('login_berhasil')): ?>
<div class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login</h5>
          <button type="button" class="btn-close" data-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <?php echo e(session('login_berhasil')); ?>

        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Selamat Datang <?php echo e(auth()->user()->name); ?> </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Hari Ini Tanggal <?php echo e(\Carbon\Carbon::now()->isoFormat('D MMMM Y')); ?></li>
                        </ol>
                        <?php if(auth()->user()->group_id == 1): ?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/daftaruser')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #F7464A">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Data User 
                                    <div class="small" style="margin-left: 13%"><?php echo e($user->count()); ?> User</div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/stokgudang')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #46BFBD">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Stok Gudang
                                    <div class="small" style="margin-left: 13%"><?php echo e($stokgudang); ?> Lusin</div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/stoktoko')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #FDB45C">
                                    <div class="card-body"><i class="bi bi-house-door" style="margin-right: 5%"></i>Stok Toko
                                    <div class="small" style="margin-left: 13%"><?php echo e($stoktoko); ?> Lusin</div>
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
                                         Total Pembelian Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp; <?php echo e($gudangpurchases->count()); ?> transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    <div>Total Penjualan Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&ensp; <?php echo e($gudangorders->count()); ?> transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    
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
                                         Total Pembelian Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp; <?php echo e($tokopurchases->count()); ?> transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    <div>Total Penjualan Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&ensp; <?php echo e($tokoorders->count()); ?> transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    
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
                                            <?php echo e($stokgudang * 12); ?>,
                                            <?php echo e($stoktoko * 12); ?>,             
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
                                                <?php echo e($stokgudang); ?>,
                                                <?php echo e($stoktoko); ?>,
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
                                //                 <?php echo e($stokgudang); ?>,
                                //                 <?php echo e($stoktoko); ?>,
                                          
                                                
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
                        <?php elseif(auth()->user()->group_id == 3): ?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/stokgudang')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #46BFBD">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Stok Gudang
                                    <div class="small" style="margin-left: 13%"><?php echo e($stokgudang); ?> Lusin</div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/stoktoko')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #FDB45C">
                                    <div class="card-body"><i class="bi bi-house-door" style="margin-right: 5%"></i>Stok Toko
                                    <div class="small" style="margin-left: 13%"><?php echo e($stoktoko); ?> Lusin</div>
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
                                         Total Pembelian Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp; <?php echo e($gudangpurchases->count()); ?> transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    <div>Total Penjualan Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&ensp; <?php echo e($gudangorders->count()); ?> transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    
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
                                                <?php echo e($stokgudang); ?>,
                                                <?php echo e($stoktoko); ?>,
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
                        <?php elseif(auth()->user()->group_id == 2): ?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/stokgudang')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #46BFBD">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Stok Gudang
                                    <div class="small" style="margin-left: 13%"><?php echo e($stokgudang); ?> Lusin</div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/stoktoko')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #FDB45C">
                                    <div class="card-body"><i class="bi bi-house-door" style="margin-right: 5%"></i>Stok Toko
                                    <div class="small" style="margin-left: 13%"><?php echo e($stoktoko); ?> Lusin</div>
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
                                         Total Pembelian Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp; <?php echo e($tokopurchases->count()); ?> transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    <div>Total Penjualan Produk &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&ensp; <?php echo e($tokoorders->count()); ?> transaksi
                                        <hr size="5px" width="100%" align="left">
                                    </div>
                                    
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
                                            <?php echo e($stokgudang); ?>,
                                            <?php echo e($stoktoko); ?>,
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
                        <?php endif; ?>





        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\web\resources\views/dashboard/index.blade.php ENDPATH**/ ?>