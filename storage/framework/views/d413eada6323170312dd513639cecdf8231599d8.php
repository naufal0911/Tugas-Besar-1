
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
                            <div class="form-group">
                              <label for="nama_sekolah">Nama Siswa</label>
                              <input class="form-control mb-3" type="text"  placeholder="<?php echo e(auth()->user()->siswa->nama_siswa); ?>" disabled>
                            </div>
                            <div class="form-group">
                              <label for="nama_sekolah">Nama Sekolah</label>
                              <input class="form-control mb-3" type="text"  placeholder="<?php echo e(auth()->user()->siswa->sekolah_siswa); ?>" disabled>
                            </div>
                            <?php if(auth()->user()->siswa->sekolah->jadwal_id == 0): ?>
                            <div class="form-group">
                              <label for="alamat_perusahaan">Tanggal Mulai PKL</label>
                              <input class="form-control mb-3" type="text"  placeholder="Belum Ada Jadwal" disabled>
                            </div>
                            <div class="form-group">
                              <label for="email_sekolah">Tanggal Selesai PKL</label>
                              <input type="text" class="form-control mb-3"  placeholder="Belum Ada Jadwal" disabled>
                            </div>
                            <?php else: ?>
                            <div class="form-group">
                              <label for="alamat_perusahaan">Tanggal Mulai</label>
                              <input class="form-control mb-3" type="text"  placeholder="<?php echo e($start); ?>" disabled>
                            </div>
                            <div class="form-group">
                              <label for="email_sekolah">Tanggal Selesai</label>
                              <input type="text" class="form-control mb-3"  placeholder="<?php echo e($end); ?>" disabled>
                            </div>
                            
                            
                            <?php if(auth()->user()->siswa->sekolah->jadwal->tanggal_mulai_pkl > $tanggal ): ?>
                            <div class="form-group">
                             <label for="nama_sekolah">Status PKL</label>
                             <input class="form-control mb-3" type="text"  placeholder="Belum Dimulai" disabled>
                           </div>
                           <?php elseif( auth()->user()->siswa->sekolah->jadwal->tanggal_selesai_pkl < $tanggal): ?>
                           <div class="form-group">
                            <label for="nama_sekolah">Status PKL</label>
                            <input class="form-control mb-3" type="text"  placeholder="Sudah Selesai" disabled>
                          </div>
                           <?php else: ?>
                           <a class="btn btn-outline-primary" href=" <?php echo e(url('/Dashboard/jadwalpkl/buat/' . auth()->user()->siswa->id)); ?> " role="button">Buat Aktivitas PKL</a>
                           <?php endif; ?>
                           <?php endif; ?>


                            
                </main>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Naufal\Documents\web\resources\views/dashboard/siswa/jadwalpkl.blade.php ENDPATH**/ ?>