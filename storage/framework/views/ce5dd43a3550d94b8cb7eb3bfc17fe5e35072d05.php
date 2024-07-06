
<?php $__env->startSection('container'); ?>
<div id="layoutSidenav">
  <div id="layoutSidenav_content">
      <main>
          <div class="container-fluid px-4">
              <h1 class="mt-4">Profile</h1>
              <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active">Profile Siswa</li>
              </ol>
              <main>
                <form action="<?php echo e(URL('/Dashboard/jadwalpkl/buat/'. auth()->user()->siswa->id )); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                            <div class="form-group">
                              <label for="nama_sekolah">Nama Siswa</label>
                              <input class="form-control mb-3" type="text" style="width: 30%" placeholder="<?php echo e(auth()->user()->siswa->nama_siswa); ?>" disabled>
                            </div>
                            <div class="form-group">
                              <label for="nama_sekolah">Nama Sekolah</label>
                              <input class="form-control mb-3" type="text" style="width: 30%" placeholder="<?php echo e(auth()->user()->siswa->sekolah_siswa); ?>" disabled>
                            </div>          
                            <div class="form-group">
                              <label for="nama_sekolah">Nama Aktivitas</label>
                              <input class="form-control mb-3" type="text" name="nama_aktivitas"  placeholder="Masukkan Nama Aktivitas">
                            </div>          
                            <div class="form-group">
                              <label for="nama_sekolah">Tanggal Aktivitas</label>
                              <input class="form-control mb-3" type="text" name="tanggal_aktivitas" style="width: 30%" value="<?php echo e($tanggal); ?>" disabled>
                            </div>   
                            <button type="submit" class="btn btn-primary">Buat</button>       
                </main>
              </form>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Naufal\Documents\web\resources\views/dashboard/siswa/buatjadwalpkl.blade.php ENDPATH**/ ?>