<?php $__env->startSection('container'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">PKL</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Penerimaan Pendaftaran</li>
                        </ol>
                        <?php if(session()->has('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table id="table_id" class="table">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Sekolah</th>
                                  <th scope="col">Nama Siswa</th>
                                  <th scope="col">Nama Aktivitas</th>
                                  <th scope="col">Tanggal Aktivitas</th>
                                  <th scope="col">Status</th>
                                </tr>
                              </thead>
                            <?php $no=1;?>
                         
                              <tbody>
                                <?php $__currentLoopData = $daftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td><?php echo e($no++); ?></td>
                                  <td><?php echo e($item->siswa->sekolah_siswa); ?></td>
                                  <td><?php echo e($item->siswa->nama_siswa); ?></td>
                                  <td><?php echo e($item->nama_aktivitas); ?></td>
                                  <td><?php echo e($item->tanggal_aktivitas); ?></td>
                                  
                                  <?php if($item->nilai_id == 0): ?>
                                  <td>
                                  Belum Dinilai
                                  </td>
                                  <?php else: ?>
                                  <td>
                                    Sudah Dinilai
                                  </td>
                                  <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                            </table>

                          </div>
                    </main>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\web\resources\views/dashboard/guru/daftarkegiatansiswa.blade.php ENDPATH**/ ?>