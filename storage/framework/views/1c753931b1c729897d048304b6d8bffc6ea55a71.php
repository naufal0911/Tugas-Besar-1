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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Selamat Datang <?php echo e(auth()->user()->name); ?></li>
                        </ol>
                        <?php if(auth()->user()->group_id == 1): ?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/daftaruser')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #F7464A">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Data User 
                                    <div class="small" style="margin-left: 13%"><?php echo e($guru->count()); ?></div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/daftarguru')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #46BFBD">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Stok Gudang
                                    <div class="small" style="margin-left: 13%"><?php echo e($guru->where('group_id', '==', '3')->count()); ?></div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/pkl')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #FDB45C">
                                    <div class="card-body"><i class="bi bi-house-door" style="margin-right: 5%"></i>Stok Toko
                                    <div class="small" style="margin-left: 13%"><?php echo e($sekolah->count()); ?></div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="bi bi-pie-chart-fill"></i>
                                        Pie Chart
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
                                                <?php echo e($guru->where('group_id', '==', '3')->count()); ?>,
                                                <?php echo e($sekolah->count()); ?>,
                                                
                                            ],
                                            backgroundColor: [
                                                "#46BFBD",
                                                "#FDB45C",
                                            ],
                                        }],
                                        labels: [
                                            "Stok Gudang",
                                            "Stok Toko"
                           
                                        ]
                                    },
                                    options: {
                                        responsive: true
                                    }
                                };
                                window.onload = function() {
                                    var ctx = document.getElementById("chart-area").getContext("2d");
                                    window.myPie = new Chart(ctx, config);
                                };
                                </script>
                        <?php elseif(auth()->user()->group_id == 3): ?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/admin/daftarsiswa')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #F7464A">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Data Siswa 
                                    <div class="small" style="margin-left: 13%"><?php echo e($siswa->where('sekolah_siswa', auth()->user()->nama_sekolah)->count()); ?></div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/siswa/daftarnilai')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #46BFBD">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Data Nilai 
                                    <div class="small" style="margin-left: 13%"><?php echo e($nilai->where('nilai', '>', '0')->where('nama_sekolah', auth()->user()->nama_sekolah)->count()); ?></div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/aktivitaspkl')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #FDB45C">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Data Kegiatan 
                                    <div class="small" style="margin-left: 13%"><?php echo e($kegiatan->where('nama_sekolah', auth()->user()->nama_sekolah)->count()); ?></div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="bi bi-pie-chart-fill"></i>
                                        Pie Chart
                                    </div>
                                    <div class="card-body"><canvas id="chart-guru" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                            <script>
                                var config = {
                                    type: 'pie',
                                    data: {
                                        datasets: [{
                                            data: [
                                                <?php echo e($siswa->where('sekolah_siswa', auth()->user()->nama_sekolah)->count()); ?>,
                                                <?php echo e($nilai->where('nilai', '>', '0')->where('nama_sekolah', auth()->user()->nama_sekolah)->count()); ?>,
                                                <?php echo e($kegiatan->where('nama_sekolah', auth()->user()->nama_sekolah)->count()); ?>


                                            ],
                                            backgroundColor: [
                                                "#F7464A",
                                                "#46BFBD",
                                                "#FDB45C",

                                            ],
                                        }],
                                        labels: [
                                            "Daftar Siswa",
                                            "Daftar Nilai",
                                            "Daftar Kegiatan"
                                        ]
                                    },
                                    options: {
                                        responsive: true
                                    }
                                };
                            
                                window.onload = function() {
                                    var ctx = document.getElementById("chart-guru").getContext("2d");
                                    window.myPie = new Chart(ctx, config);
                                };
                            
                                                      </script>
                        <?php elseif(auth()->user()->group_id == 4): ?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/siswa/daftarnilai')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #46BFBD">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Data Nilai 
                                    <div class="small" style="margin-left: 13%"><?php echo e($nilai->where('nilai', '>', '0')->count()); ?></div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/aktivitaspkl')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #F7464A">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Data Kegiatan 
                                    <div class="small" style="margin-left: 13%"><?php echo e($kegiatan->count()); ?></div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="bi bi-pie-chart-fill"></i>
                                        Pie Chart
                                    </div>
                                    <div class="card-body"><canvas id="chart-siswa" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                            <script>
                                var config = {
                                    type: 'pie',
                                    data: {
                                        datasets: [{
                                            data: [
                                                <?php echo e($kegiatan->where('nama_sekolah', auth()->user()->siswa->sekolah_siswa)->count()); ?>,
                                                <?php echo e($nilai->where('nama_sekolah', auth()->user()->siswa->sekolah_siswa)->where('nilai', '>', '0')->count()); ?>

                                                
                                            ],
                                            backgroundColor: [
                                                "#F7464A",
                                                "#46BFBD",
                                            ],
                                        }],
                                        labels: [
                                            "Daftar Kegiatan",
                                            "Daftar Nilai"
                                        ]
                                    },
                                    options: {
                                        responsive: true
                                    }
                                };
                            
                                window.onload = function() {
                                    var ctx = document.getElementById("chart-siswa").getContext("2d");
                                    window.myPie = new Chart(ctx, config);
                                };
                            
                                                      </script>
                        <?php elseif(auth()->user()->group_id == 5): ?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/siswa/daftarnilai')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #46BFBD">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Data Nilai 
                                    <div class="small" style="margin-left: 13%"><?php echo e($nilai->where('nilai', '>', '0')->count()); ?></div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/aktivitaspkl')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #F7464A">
                                    <div class="card-body"><i class="bi bi-people" style="margin-right: 5%"></i>Data Kegiatan 
                                    <div class="small" style="margin-left: 13%"><?php echo e($kegiatan->count()); ?></div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="bi bi-pie-chart-fill"></i>
                                        Pie Chart
                                    </div>
                                    <div class="card-body"><canvas id="chart-siswa" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                            <script>
                                var config = {
                                    type: 'pie',
                                    data: {
                                        datasets: [{
                                            data: [
                                                <?php echo e($kegiatan->count()); ?>,
                                                <?php echo e($nilai->where('nilai', '>', '0')->count()); ?>

                                                
                                            ],
                                            backgroundColor: [
                                                "#F7464A",
                                                "#46BFBD",
                                            ],
                                        }],
                                        labels: [
                                            "Daftar Kegiatan",
                                            "Daftar Nilai"
                                        ]
                                    },
                                    options: {
                                        responsive: true
                                    }
                                };
                            
                                window.onload = function() {
                                    var ctx = document.getElementById("chart-siswa").getContext("2d");
                                    window.myPie = new Chart(ctx, config);
                                };
                            
                                                      </script>
                        <?php elseif(auth()->user()->group_id == 2): ?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <a href="<?php echo e(url('/Dashboard/pkl')); ?>" style="text-decoration:none">
                                <div class="card text-white mb-4" style="background-color: #F7464A">
                                    <div class="card-body"><i class="bi bi-house-door" style="margin-right: 5%"></i>Data Sekolah 
                                    <div class="small" style="margin-left: 13%"><?php echo e($sekolah->count()); ?></div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="bi bi-pie-chart-fill"></i>
                                        Pie Chart
                                    </div>
                                    <div class="card-body"><canvas id="chart-siswa" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                            <script>
                                var config = {
                                    type: 'pie',
                                    data: {
                                        datasets: [{
                                            data: [
                                                <?php echo e($sekolah->count()); ?>,
                                                
                                            ],
                                            backgroundColor: [
                                                "#F7464A",
                                            ],
                                        }],
                                        labels: [
                                            "Daftar Sekolah",
                                        ]
                                    },
                                    options: {
                                        responsive: true
                                    }
                                };
                            
                                window.onload = function() {
                                    var ctx = document.getElementById("chart-siswa").getContext("2d");
                                    window.myPie = new Chart(ctx, config);
                                };
                            
                                                      </script>
                        <?php endif; ?>





        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\web\resources\views/dashboard/index.blade.php ENDPATH**/ ?>