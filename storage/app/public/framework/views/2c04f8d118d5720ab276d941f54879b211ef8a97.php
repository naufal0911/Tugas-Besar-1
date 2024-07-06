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
                          <?php if(session()->has('edit_password_berhasil')): ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?php echo e(session('edit_password_berhasil')); ?>

                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                          <?php endif; ?>
                                      <div class="form-group">
                                        <label for="nama_sekolah">Nama Siswa</label>
                                        <input class="form-control mb-3" type="text" style="width: 30%" placeholder="<?php echo e(auth()->user()->siswa->nama_siswa); ?>" disabled>
                                      </div>
                                      <div class="form-group">
                                        <label for="alamat_perusahaan">Sekolah</label>
                                        <input class="form-control mb-3" type="text" style="width: 30%" placeholder="<?php echo e(auth()->user()->siswa->sekolah_siswa); ?>" disabled>
                                      </div>
                                      <div class="form-group">
                                        <label for="email_sekolah">Email</label>
                                        <input type="text" class="form-control mb-3" style="width: 30%" placeholder="<?php echo e(auth()->user()->siswa->email_siswa); ?>" disabled>
                                      </div>
                                      <div class="form-group">
                                        <label for="email_sekolah">Alamat Rumah</label>
                                        <input type="text" class="form-control mb-3" style="width: 30%" placeholder="<?php echo e(auth()->user()->siswa->alamat_rumah); ?>" disabled>
                                      </div>
                                      <div class="form-group">
                                        <label for="email_sekolah">Jurusan</label>
                                        <input type="text" class="form-control mb-3" style="width: 35%" placeholder="<?php echo e(auth()->user()->siswa->jurusan); ?>" disabled>
                                      </div>
                                      <div class="form-group">
                                        <label for="edit profile" class="mb-2">Edit Profile</label>
                                        <label for="edit password" style="margin-left: 15%">Edit Password</label>
                                      </div>
                                      <a class="btn btn-outline-primary" href=" <?php echo e(url('/Dashboard/profile/edit/' . auth()->user()->siswa->id)); ?> " role="button">Edit Profile</a>
                                      <a class="btn btn-outline-success" style="margin-left: 12%" href=" <?php echo e(url('/Dashboard/profile/editpassword/' . auth()->user()->id)); ?> " role="button">Edit Password</a>
                          </main>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sipkl/web/resources/views/dashboard/siswa/profile.blade.php ENDPATH**/ ?>