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
                        <div  class="table-responsive">
                            <table id="table_id" class="display">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Siswa</th>
                                  <th>Sekolah Siswa</th>
                                  <th>Nis Siswa</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                            <?php $no=1;?>
                           
                              <tbody>
                                
                                    
                           
                                <?php $__currentLoopData = $daftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($tanggal > $item->sekolah->jadwal->tanggal_selesai_pkl): ?>
                                    
                                
                                <tr>
                                  <td><?php echo e($no++); ?></td>
                                  <td><?php echo e($item->nama_siswa); ?></td>
                                  <td><?php echo e($item->sekolah_siswa); ?></td>
                                  <td><?php echo e($item->nis_siswa); ?></td>
                                  <td> <a href="<?php echo e(URL('/Dashboard/pimdev/cetaknilai/'.$item->nis_siswa )); ?>"><span class="badge bg-success">Cetak Nilai</span></a></td>
                                </tr>
                                <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                          </tbody>
                            </table>
                          </div>
                    </main>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Acer\Downloads\Compressed\web\resources\views/dashboard/pimdev/cetaknilai.blade.php ENDPATH**/ ?>