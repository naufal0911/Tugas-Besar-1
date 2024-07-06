
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
                        <?php if(session()->has('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo e(session('error')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table id="table_id" class="table">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Guru</th>
                                  <th scope="col">Email Guru</th>
                                  <th scope="col">Sekolah</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                            <?php $no=1;?>
                            
                              <tbody>
                                <tr>
                                  <?php $__currentLoopData = $guru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <td><?php echo e($no++); ?></td>
                                  <td><?php echo e($item->name); ?></td>
                                  <td><?php echo e($item->email); ?></td>
                                  <td><?php echo e($item->nama_sekolah); ?></td>
                                  <?php if($item->hak == 0): ?>
                                  <td><a href="<?php echo e(URL('/Dashboard/prosesguru/'.$item->id )); ?>"><span class="badge bg-success" >Verifikasi</span></a>
                                  <a href="<?php echo e(URL('/Dashboard/prosesgurutolak/'.$item->id )); ?>"><span class="badge bg-danger" >Tolak</span></a>
                                  </td>
                                  <?php else: ?>
                                  <td>Sudah di Verifikasi
                                    <a href="<?php echo e(URL('/Dashboard/prosesguruhapus/'.$item->id )); ?>"><span class="badge bg-danger" >Hapus</span></a>
                                  </td>
                                  
                                  <?php endif; ?>
                                </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                            </table>

                          </div>
                    </main>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\web\resources\views/dashboard/admin/daftarguru.blade.php ENDPATH**/ ?>