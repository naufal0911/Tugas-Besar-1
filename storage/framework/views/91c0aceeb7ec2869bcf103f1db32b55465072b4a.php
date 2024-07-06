
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
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addProductModal">
                            Tambah Produk
                        </button>
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
                                <tbody>
                                    <?php $no=1; ?>
                                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($no++); ?></td>
                                        <td><?php echo e($item->bahan); ?></td>
                                        <td><?php echo e($item->model); ?></td>
                                        <td>No. <?php echo e($item->seri); ?></td>
                                        <td>
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#detail<?php echo e($item->id); ?>"><span class="badge bg-info"><i class="bi bi-eye"></i></span></a>
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#edit<?php echo e($item->id); ?>"><span class="badge bg-warning"><i class="bi bi-pencil"></i></span></a>
                                            <a href="#" onclick="confirmDelete('<?php echo e($item->id); ?>', '<?php echo e($item->bahan); ?>', '<?php echo e($item->model); ?>')" class="badge bg-danger"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                    
                                    <div class="modal fade" id="detail<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?php echo e($item->id); ?>" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel<?php echo e($item->id); ?>">Detail Produk</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="bahan">Nama Bahan</label>
                                                            <input type="text" class="form-control mb-3" value="<?php echo e($item->bahan); ?>" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="model">Nama Model</label>
                                                            <input type="text" class="form-control mb-3" value="<?php echo e($item->model); ?>" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="warna">Warna</label>
                                                            <input type="text" class="form-control mb-3" value="<?php echo e($item->warna); ?>" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="seri">Nomor Seri</label>
                                                            <input type="text" class="form-control mb-3" value="<?php echo e($item->seri); ?>" disabled>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="modal fade" id="edit<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo e($item->id); ?>" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel<?php echo e($item->id); ?>">Edit Produk</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="<?php echo e(url('/Dashboard/proseseditproduct')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                                        <div class="form-group">
                                                            <label for="bahan">Nama Bahan</label>
                                                            <input type="text" name="bahan" class="form-control mb-3" value="<?php echo e($item->bahan); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="model">Nama Model</label>
                                                            <input type="text" name="model" class="form-control mb-3" value="<?php echo e($item->model); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="warna">Warna</label>
                                                            <input type="text" name="warna" class="form-control mb-3" value="<?php echo e($item->warna); ?>">
                                                        </div>
                                                        <button type="submit" class="btn btn-outline-success">
                                                            Edit
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="modal fade" id="hapus<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel<?php echo e($item->id); ?>" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapusModalLabel<?php echo e($item->id); ?>">Hapus Produk</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin menghapus produk "<?php echo e($item->bahan); ?> - <?php echo e($item->model); ?>"? Ini akan menghapus seluruh data yang bersinggungan dengan produk ini.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form id="deleteForm<?php echo e($item->id); ?>" action="<?php echo e(url('/Dashboard/proseshapusproduct')); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
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
        </div>
    </div>
</div>


<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(url('/Dashboard/prosesaddproduct')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="bahan">Nama Bahan</label>
                        <input type="text" name="bahan" class="form-control mb-3" required>
                    </div>
                    <div class="form-group">
                        <label for="model">Nama Model</label>
                        <input type="text" name="model" class="form-control mb-3" required>
                    </div>
                    <div class="form-group">
                        <label for="warna">Warna</label>
                        <input type="text" name="warna" class="form-control mb-3" required>
                    </div>
                    <div class="form-group">
                        <label for="seri">Nomor Seri</label>
                        <input type="text" name="seri" class="form-control mb-3" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">
                        Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function deleteProduct(id) {
        document.getElementById(`deleteForm${id}`).submit();
    }

    function confirmDelete(id, bahan, model) {
        var modal = `
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin menghapus produk "${bahan} - ${model}"? Ini akan menghapus seluruh data yang bersinggungan dengan produk ini.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form id="deleteForm${id}" action="<?php echo e(url('/Dashboard/proseshapusproduct')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="${id}">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Remove any existing modal
        $('#confirmDeleteModal').remove();
        
        // Append the new modal to body and show it
        $('body').append(modal);
        $('#confirmDeleteModal').modal('show');
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ujicoba\web\resources\views/dashboard/admin/masterproduct.blade.php ENDPATH**/ ?>