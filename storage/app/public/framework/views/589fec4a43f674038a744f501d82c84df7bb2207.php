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
                        <h1 class="mt-4">Pendaftaran Akun Siswa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Formulir</li>
                        </ol>
                        <form action="<?php echo e(url('/Dashboard/pendaftaransiswa')); ?>" method="POST" >
                          <?php echo csrf_field(); ?>
                            <div class="form-group">
                              <label for="nama_sekolah">NIS Siswa</label>
                              <input type="text" class="form-control mb-3" name="nis_siswa" placeholder="Masukkan Nis Siswa">
                            </div>
                            <div class="form-group">
                              <label for="alamat_perusahaan">Nama Siswa</label>
                              <input type="text" class="form-control mb-3" name="nama_siswa" placeholder="Masukkan Nama Siswa">
                            </div>
                            <div class="form-group">
                                <label for="email_sekolah">Sekolah Siswa</label>
                                <select class="form-select mb-3" aria-label="Default select example" name="sekolah_siswa">
                                  <?php $__currentLoopData = $daftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($item->nama_sekolah); ?>"> <?php echo e($item->nama_sekolah); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                                </select>
                              </div>
                            <div class="form-group">
                              <label for="email_sekolah">Email Siswa</label>
                              <input type="email" class="form-control mb-3" name="email_siswa" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                </main>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applications\web\resources\views/dashboard/guru/pendaftaransiswa.blade.php ENDPATH**/ ?>