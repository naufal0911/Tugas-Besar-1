
<?php $__env->startSection('container'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Jadwal PKL</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Jadwal PKL <?php echo e(auth()->user()->siswa->nama_siswa); ?></li>
                        </ol>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Sekolah</th>
                                <th scope="col">Alamat Sekolah</th>
                                <th scope="col">Email Sekolah</th>
                                <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applications\web\resources\views/dashboard/siswa/jadwalpkl.blade.php ENDPATH**/ ?>