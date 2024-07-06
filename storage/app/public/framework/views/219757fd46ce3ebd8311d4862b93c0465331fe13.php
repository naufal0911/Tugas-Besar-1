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
                        <h1 class="mt-4">Pendaftaran Siswa Pkl</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Formulir</li>
                        </ol>
                        <form action="<?php echo e(url('/Dashboard/daftarpkl')); ?>" method="POST" enctype="multipart/form-data">
                          <?php echo csrf_field(); ?>
                            <div class="form-group">
                              <label for="nama_sekolah">Nama Sekolah</label>
                              <input type="text" class="form-control mb-3" name="nama_sekolah" placeholder="Masukkan Nama Perusahaan/Instansi">
                            </div>
                            <div class="form-group">
                              <label for="alamat_perusahaan">Alamat Sekolah</label>
                              <input type="text" class="form-control mb-3" name="alamat_sekolah" placeholder="Masukkan Alamat Perusahaan/Instansi">
                            </div>
                            <div class="form-group">
                              <label for="email_sekolah">Email</label>
                              <input type="email" class="form-control mb-3" name="email_sekolah" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email">
                            </div>

                            <div class="form-group">
                                <label for="dok_daftar_siswa">Dokumen Pendukung</label>
                                <input type="file" class="form-control mb-3" name="dok_daftar_siswa" placeholder="Masukkan Dokumen">
                              </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                </main>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sipkl/web/resources/views/dashboard/guru/daftar.blade.php ENDPATH**/ ?>