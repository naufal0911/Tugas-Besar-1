<?php $__env->startSection('container'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">PKL</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Penerimaan Pendaftaran</li>
                        </ol>
                        <div class="table-responsive">
                            <table id="table_id" class="display">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Sekolah</th>
                                  <th scope="col">Alamat Sekolah</th>
                                  <th scope="col">Email Sekolah</th>
                                  <th scope="col">Status</th>
                                </tr>
                              </thead>
                            <?php $no=1;?>
                              <tbody>
                                <tr>
                                  <?php $__currentLoopData = $daftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <td><?php echo e($no++); ?></td>
                                  <td><?php echo e($item->nama_sekolah); ?></td>
                                  <td><?php echo e($item->alamat_sekolah); ?></td>
                                  <td><?php echo e($item->email_sekolah); ?></td>
                                  <td><?php echo e($item->status); ?>

                                  <?php if($item->status == 'Ditolak'): ?>
                                    <a href="<?php echo e(URL('/Dashboard/staff/destroy/'.$item->id )); ?>"><span class="badge bg-danger">Hapus</span></a>
                                  </td>      
                                  <?php endif; ?>
                                  <a href="<?php echo e(URL('/Dashboard/persetujuanpkl/status/detail/'.$item->id )); ?>"><span class="badge bg-info" >Detail</span></a>
                                </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                            </table>
                          </div>
                    </main>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sipkl/web/resources/views/dashboard/guru/persetujuan.blade.php ENDPATH**/ ?>