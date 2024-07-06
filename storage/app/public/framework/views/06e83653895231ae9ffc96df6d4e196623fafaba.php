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
          <form action="<?php echo e(URL('/Dashboard/staff/status/buatjadwal/'.$daftar->id )); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Pembuatan Jadwal Pkl</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Formulir</li>
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
                    <div class="form-group">
                      <label for="tanggal_mulai_pkl">Tanggal Mulai PKL</label>
                      <input type="date" class="form-control mb-3" style="width: 20%" name="tanggal_mulai_pkl">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_mulai_pkl">Tanggal Selesai PKL</label>
                        <input type="date" class="form-control mb-3" style="width: 20%" name="tanggal_selesai_pkl">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
        </main>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Naufal\Documents\web\resources\views/dashboard/staff/buatjadwal.blade.php ENDPATH**/ ?>