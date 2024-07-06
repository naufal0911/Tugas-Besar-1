
<?php $__env->startSection('container'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">PRODUK</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Seluruh Daftar Produk</li>
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
                            <i class="fas fa-table me-1"></i>
                            Daftar Produk
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                          <table id="table_id" class="table table-striped" style="width:100%">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Bahan</th>
                                  <th scope="col">Nama Model</th>
                                  <th scope="col">Nomor Seri</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                            <?php $no=1;?>
                            
                              <tbody>
                                <tr>
                                  <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <td><?php echo e($no++); ?></td>
                                  <td><?php echo e($item->bahan); ?></td>
                                  <td><?php echo e($item->model); ?></td>
                                  <td>No. <?php echo e($item->seri); ?></td>
                                  <td>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#edit<?php echo e($item->id); ?>"><span class="badge bg-warning"><i class="bi bi-pencil"></i></span></a>
                                  </td>
                                </tr>
                                                                 
                                                                 <div class="modal fade" id="edit<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                  <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                          <form method="POST" action="<?php echo e(url('/Dashboard/proseseditproduct')); ?>">
                                                                              <?php echo csrf_field(); ?>
                                                                              <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                                                                <div class="form-group">
                                                                                  <label for="nama_aktivitas">Nama Bahan</label>
                                                                                  <input type="text" name="bahan" class="form-control mb-3" value="<?php echo e($item->bahan); ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                  <label for="nama_aktivitas">Nama Model</label>
                                                                                  <input type="text" name="model" class="form-control mb-3" value="<?php echo e($item->model); ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                  <label for="nama_aktivitas">Warna</label>
                                                                                  <input type="text" name="warna" class="form-control mb-3" value="<?php echo e($item->warna); ?>">
                                                                                </div>
                                                                                    <button type="submit" class="btn btn-outline-success">
                                                                                      Edit
                                                                                  </button>
                                                                              </div>
                                                                          </form>
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

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\web\resources\views/dashboard/admin/daftarproduct.blade.php ENDPATH**/ ?>