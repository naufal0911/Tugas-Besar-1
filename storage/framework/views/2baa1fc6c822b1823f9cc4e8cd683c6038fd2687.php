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
                        <?php elseif(session()->has('danger')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?php echo e(session('danger')); ?>

                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table id="table_id" class="table">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Sekolah</th>
                                  <th scope="col">Alamat Sekolah</th>
                                  <th scope="col">Email Sekolah</th>
                                  <th scope="col">Aksi</th>
                                  <th scope="col">Status</th>
                                </tr>
                              </thead>
                            <?php $no=1;?>
                            
                              <tbody>
                                <?php $__currentLoopData = $daftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td><?php echo e($no++); ?></td>
                                  <td><?php echo e($item->nama_sekolah); ?></td>
                                  <td><?php echo e($item->alamat_sekolah); ?></td>
                                  <td><?php echo e($item->email_sekolah); ?></td>
                                  <td>
                                    <?php if($item->status =='Ditolak'): ?>
                                    <a href="<?php echo e(URL('/Dashboard/staff/destroy/'.$item->id )); ?>"><span class="badge bg-danger" >Hapus</span></a>
                                    <td><?php echo e($item->status); ?></td>
                                    <?php elseif($item->status =='Sedang Diproses'): ?>
                                     <a href="<?php echo e(URL('/Dashboard/staff/status/terima/'.$item->id )); ?>"><span class="badge bg-success" >Terima</span></a>
                                     <a href="<?php echo e(URL('/Dashboard/staff/status/ditolak/'.$item->id )); ?>"><span class="badge bg-danger" >Tolak</span></a>
                                     <a href="<?php echo e(URL('/Dashboard/pkl/staff/status/detail/'.$item->id )); ?>"><span class="badge bg-info" >Detail</span></a>
                                     <td><?php echo e($item->status); ?></td>
                                     <?php elseif($item->status == "Diterima"): ?>
                                     <a href="<?php echo e(URL('/Dashboard/pkl/staff/status/detail/'.$item->id )); ?>"><span class="badge bg-info" >Detail</span></a>
                                     <?php if($item->jadwal_id == 0): ?>
                                     <a href="<?php echo e(URL('/Dashboard/pkl/staff/status/buatjadwal/'.$item->id )); ?>"><span class="badge bg-primary" >Buat Jadwal</span></a>
                                     <?php elseif(! $item->jadwal_id == 0): ?> 

                                     <?php endif; ?>
                                     
                                     <td><?php echo e($item->status); ?></td>
                                     <?php else: ?>
                                     <a href="<?php echo e(URL('/Dashboard/pkl/staff/status/detail/'.$item->id )); ?>"><span class="badge bg-info" >Detail</span></a>
                                     <a href="<?php echo e(URL('/Dashboard/staff/status/proses/'.$item->id )); ?>"><span class="badge bg-warning">Proses</span></a>
                                     <td>Belum Diproses</td>
                                     <?php endif; ?>
                                </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                              </tbody>
                             
                            </table>
                          </div>
                    </main>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sipkl/web/resources/views/dashboard/staff/pkl.blade.php ENDPATH**/ ?>