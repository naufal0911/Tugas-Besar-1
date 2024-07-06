
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
                                  <th scope="col">Nama Kegiatan</th>
                                  <th scope="col">Nama Siswa</th>
                                  <th scope="col">Sekolah Siswa</th>
                                  <th scope="col">Tanggal kegiatan</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                            <?php $no=1;?>
                    
                              <tbody>
                                <?php $__currentLoopData = $daftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td><?php echo e($no++); ?></td>
                                  <td><?php echo e($item->nama_aktivitas); ?></td>
                                  <td><?php echo e($item->siswa->nama_siswa); ?></td>
                                  <td><?php echo e($item->siswa->sekolah_siswa); ?></td>
                                  <td><?php echo e($item->tanggal_aktivitas); ?></td>
                                  <td>
                                    <a href="<?php echo e(URL('/Dashboard/pimdev/detail/'.$item->id )); ?>"><span class="badge bg-info">Detail</span></a>
                                    <?php if($item->nilai_id == 0): ?>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#nilai<?php echo e($item->id); ?>"><span class="badge bg-success">Nilai</span></a>
                                    <?php else: ?>
                                    Sudah Dinilai
                                    <?php endif; ?>
                                  </td>



                              
                              <div class="modal fade" id="nilai<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nilai</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                  </div>
                                  <div class="modal-body">
                                      <form method="POST" action="<?php echo e(url('/Dashboard/pimdev/nilaikegiatan')); ?>">
                                          <?php echo csrf_field(); ?>
                                          <input type="hidden" name="aktivitas_id" value="<?php echo e($item->id); ?>">
                                            <div class="form-group">
                                              <label for="nama_aktivitas">Nama Aktivitas</label>
                                              <input type="text" class="form-control mb-3" value="<?php echo e($item->nama_aktivitas); ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                              <label for="nilai">Nilai</label>
                                              <input type="number" class="form-control mb-3 <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nilai')); ?>" 
                                              placeholder="Masukkan Nilai" name="nilai">
                                              <?php $__errorArgs = ['nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                              <span class="invalid-feedback mb-2" role="alert">
                                                  <strong><?php echo e($message); ?></strong>
                                              </span>
                                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                                  <button type="submit" class="btn btn-outline-success">
                                                      Submit
                                                  </button>
                                      </form>
                                  </div>
                                </div>
                              </div>
                        </div>
                        
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                            </table>


                          </div>
                    </main>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Acer\Downloads\Compressed\web\resources\views/dashboard/pimdev/daftarkegiatan.blade.php ENDPATH**/ ?>