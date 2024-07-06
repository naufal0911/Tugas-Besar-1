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
                            <?php if(session()->has('edit_profile_berhasil')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('edit_profile_berhasil')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                            <?php endif; ?>
                            <form action="<?php echo e(url('/Dashboard/profile/edit/{id}')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                      <div class="form-group">
                                        <label for="nama_sekolah">Nama Siswa</label>
                                        <input class="form-control mb-3" name="nama_siswa" type="text" style="width: 30%" value="<?php echo e(auth()->user()->siswa->nama_siswa); ?>" disabled>
                                      </div>
                                      <div class="form-group">
                                        <label for="alamat_perusahaan">Sekolah</label>
                                        <input class="form-control mb-3" name="alamat_sekolah" type="text" style="width: 30%" value="<?php echo e(auth()->user()->siswa->sekolah_siswa); ?>" disabled>
                                      </div>
                                      <div class="form-group">
                                        <label for="email_sekolah">Email</label>
                                        <input type="text" class="form-control mb-3" name="email_siswa" style="width: 30%" value="<?php echo e(auth()->user()->siswa->email_siswa); ?>" disabled>
                                      </div>
                                      <div class="form-group">
                                        <label for="email_sekolah">Alamat Rumah</label>
                                        <input type="text" class="form-control mb-3" name="alamat_rumah" style="width: 30%" value="<?php echo e(auth()->user()->siswa->alamat_rumah); ?>" >
                                      </div>
                                      <div class="form-group">
                                        <label for="email_sekolah">Jurusan</label>
                                        <input type="text" class="form-control mb-3" name="jurusan" style="width: 35%" value="<?php echo e(auth()->user()->siswa->jurusan); ?>" >
                                      </div>
                                      <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                                    </main>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sipkl/web/resources/views/dashboard/siswa/editprofile.blade.php ENDPATH**/ ?>