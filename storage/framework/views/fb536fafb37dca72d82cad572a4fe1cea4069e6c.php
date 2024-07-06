
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
                           <a type="button" data-bs-toggle="modal" data-bs-target="#kegiatan"><span class="btn btn-outline-primary">Buat Aktivitas PKL</span></a>
                           <?php endif; ?>
                           <?php endif; ?>
                              
                              <div class="modal fade" id="kegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Aktivitas</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="<?php echo e(URL('/Dashboard/jadwalpkl/buat/'. auth()->user()->siswa->id )); ?>">
                                            <?php echo csrf_field(); ?>
                                              <div class="form-group">
                                                <label for="nama_aktivitas">Tanggal</label>
                                                <input type="text" class="form-control mb-3" value="<?php echo e($tanggall); ?>" disabled>
                                              </div>
                                              <div class="form-group">
                                                <label for="nama_sekolah">Nama Aktivitas</label>
                                                <input class="form-control mb-3" type="text" name="nama_aktivitas"  placeholder="Masukkan Nama Aktivitas">
                                              </div>          
                                                    <button type="submit" class="btn btn-outline-success">
                                                        Submit
                                                    </button>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                          </div>
                          

                            
                </main>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Acer\Downloads\Compressed\web\resources\views/dashboard/siswa/jadwalpkl.blade.php ENDPATH**/ ?>