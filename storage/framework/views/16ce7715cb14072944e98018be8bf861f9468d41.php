
<?php $__env->startSection('container'); ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
          <?php if(session()->has('daftar_sukses')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?php echo e(session('daftar_sukses')); ?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Detail Pkl</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
                    <div class="form-group">
                      <label for="nama_sekolah">Nama Siswa</label>
                      <input class="form-control mb-3" type="text" placeholder="<?php echo e($daftar->siswa->nama_siswa); ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="nama_sekolah">Nama Aktivitas</label>
                      <input class="form-control mb-3" type="text" placeholder="<?php echo e($daftar->nama_aktivitas); ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="nama_sekolah">Tanggal Aktivitas</label>
                      <input class="form-control mb-3" type="text" placeholder="<?php echo e($daftar->tanggal_aktivitas); ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="nama_sekolah">Nama Sekolah</label>
                      <input class="form-control mb-3" type="text" placeholder="<?php echo e($daftar->siswa->sekolah_siswa); ?>" disabled>
                    </div>
                    <br><a onclick="history.back(-1)" role="button" style="font-size: 30px"><i class="bi bi-skip-backward-circle"></i></a>
        </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Naufal\Documents\web\resources\views/Dashboard/pimdev/detailkegiatan.blade.php ENDPATH**/ ?>