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
                      <label for="nama_sekolah">Nama Sekolah</label>
                      <input class="form-control mb-3" type="text" placeholder="<?php echo e($daftar->nama_sekolah); ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="alamat_perusahaan">Alamat Sekolah</label>
                      <input class="form-control mb-3" type="text" placeholder="<?php echo e($daftar->alamat_sekolah); ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="email_sekolah">Email</label>
                      <input type="text" class="form-control mb-3" placeholder="<?php echo e($daftar->email_sekolah); ?>" disabled>
                    </div>
                    <?php if($daftar->jadwal_id != 0): ?>
                    <div class="form-group">
                      <label for="tanggal_mulai_pkl">Tanggal Mulai PKL</label>
                      <input type="text" class="form-control mb-3" placeholder="<?php echo e($start); ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="tanggal_mulai_pkl">Tanggal Selesai PKL</label>
                      <input type="text" class="form-control mb-3" placeholder="<?php echo e($end); ?>" disabled>
                    </div>
                    
                    <?php if(  $daftar->tanggal >= $daftar->jadwal->tanggal_mulai_pkl & $daftar->tanggal <= $daftar->jadwal->tanggal_selesai_pkl ): ?>
                    <div class="form-group">
                      <label for="tanggal_mulai_pkl">Status PKL</label>
                      <input type="text" class="form-control mb-3" placeholder="Sedang Dilaksanakan" disabled>
                    </div>
                    <?php elseif( $daftar->tanggal < $daftar->jadwal->tanggal_mulai_pkl ): ?>
                    <div class="form-group">
                      <label for="tanggal_mulai_pkl">Status PKL</label>
                      <input type="text" class="form-control mb-3" placeholder="Belum Dilaksanakan" disabled>
                    </div>
                    <?php elseif( $daftar->tanggal > $daftar->jadwal->tanggal_selesai_pkl ): ?>
                    <div class="form-group">
                      <label for="tanggal_mulai_pkl">Status PKL</label>
                      <input type="text" class="form-control mb-3" placeholder="Selesai Dilaksanakan" disabled>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="dok_daftar_siswa" class="mb-2">Dokumen Pendukung</label>
                      </div>
                    <a class="btn btn-outline-primary mb-3" href="<?php echo e(asset('storage/' . $daftar->dok_daftar_siswa)); ?>" role="button">Download Dokumen Pendukung</a>
                    <br><a onclick="history.back(-1)" role="button" style="font-size: 30px"><i class="bi bi-skip-backward-circle"></i></a>
                    </main>
                    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sipkl/web/resources/views/dashboard/detail.blade.php ENDPATH**/ ?>