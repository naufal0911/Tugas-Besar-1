
<?php $__env->startSection('container'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Stok Gudang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Seluruh Stok Gudang</li>
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
                        <div class="card mb-4">
                          <div class="card-header">
                            <i class="fa-solid fa-warehouse"></i>
                            Stok Gudang
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_id" class="table table-striped" style="width:100%">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nomor Seri</th>
                                  <th scope="col">Kuantitas</th>
                                  <th scope="col">Tersedia</th>
                                  <th scope="col">Terjual</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                            <?php $no=1;?>
                            
                              <tbody>
                                <tr>
                                  <?php $__currentLoopData = $gudang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <td><?php echo e($no++); ?></td>
                                  <td>No. <?php echo e($item->productID); ?></td>
                                  <td><?php echo e($item->quantity); ?> Lusin</td>
                                  <td><?php echo e($item->available); ?> Lusin</td>
                                  <td><?php echo e($item->sold); ?> Lusin</td>
                                  <td>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#detail<?php echo e($item->id); ?>"><span class="badge bg-primary"><i class="bi bi-eye"></i></span></a>
                                  </td>
                                </tr>
                                      </div>
                                    </div>
                                  </div>
                                  
                                              <div class="modal fade" id="detail<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Detail Stok Gudang</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                                              <div class="form-group">
                                                                <label for="nama_aktivitas">Product ID</label>
                                                                <input type="text"  class="form-control mb-3" value="No. <?php echo e($item->productID); ?>" disabled>
                                                              </div>
                                                              <div class="form-group">
                                                                <label for="nama_aktivitas">Kuantitas</label>
                                                                <input type="text" class="form-control mb-3" value="<?php echo e($item->quantity*12); ?> buah" disabled>
                                                              </div>
                                                              <div class="form-group">
                                                                <label for="nama_aktivitas">Tersedia</label>
                                                                <input type="text"  class="form-control mb-3" value="<?php echo e($item->available*12); ?> buah" disabled>
                                                              </div>
                                                              <div class="form-group">
                                                                <label for="nama_aktivitas">Terjual</label>
                                                                <input type="text" class="form-control mb-3" value="<?php echo e($item->sold*12); ?> buah" disabled>
                                                              </div>
                                                            </div>
                                                    </div>
                                                  </div>
                                                </div>
                                          </div>
                                
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                            </table>
                          
                        </div>
                          </div>
                        </div>
                    </main>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ujicoba\web\resources\views/dashboard/gudang/stokgudang.blade.php ENDPATH**/ ?>