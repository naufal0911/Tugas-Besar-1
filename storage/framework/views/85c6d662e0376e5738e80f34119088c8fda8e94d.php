
<?php $__env->startSection('container'); ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">USER</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Seluruh Daftar User</li>
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
                        Daftar User
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            Tambah User
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_id" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Email User</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; ?>
                                    <?php $__currentLoopData = $guru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($no++); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->email); ?></td>
                                        <td><?php echo e($item->group->nama_group); ?></td>
                                        <td>
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#edit<?php echo e($item->id); ?>"><span class="badge bg-warning"><i class="bi bi-pencil"></i></span></a>
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#hapus<?php echo e($item->id); ?>"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                        </td>
                                    </tr>
                                    
                                    <div class="modal fade" id="edit<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="<?php echo e(url('/Dashboard/prosesuseredit')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                                        <div class="form-group">
                                                            <label for="name">Nama User</label>
                                                            <input type="text" name="name" class="form-control mb-3" value="<?php echo e($item->name); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input type="text" name="username" class="form-control mb-3" value="<?php echo e($item->username); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="text" name="email" class="form-control mb-3" value="<?php echo e($item->email); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="role">Role</label>
                                                            <select class="form-select mb-3" aria-label="Default select example" name="role">
                                                                <option selected value="<?php echo e($item->group->id); ?>">Role Sekarang Sebagai <?php echo e($item->group->nama_group); ?></option>
                                                                <option value="1">Admin</option>
                                                                <option value="2">User Toko</option>
                                                                <option value="3">User Gudang</option>
                                                            </select>
                                                            <button type="submit" class="btn btn-outline-success">
                                                                Edit
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="modal fade" id="hapus<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="<?php echo e(url('/Dashboard/prosesuserhapus')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                                        <div class="form-group">
                                                            <label for="name">Nama User</label>
                                                            <input type="text" class="form-control mb-3" value="<?php echo e($item->name); ?>" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="role">Role</label>
                                                            <input type="text" class="form-control mb-3" value="<?php echo e($item->group->nama_group); ?>" disabled>
                                                        </div>
                                                        <button type="submit" class="btn btn-outline-danger">
                                                            Hapus
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
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>


<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(url('/Dashboard/prosesuseradd')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Nama User</label>
                        <input type="text" name="name" class="form-control mb-3" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control mb-3" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control mb-3" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control mb-3" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-select mb-3" name="role" required>
                            <option selected disabled>Pilih Role</option>
                            <option value="1">Admin</option>
                            <option value="2">User Toko</option>
                            <option value="3">User Gudang</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ujicoba\web\resources\views/dashboard/admin/masteruser.blade.php ENDPATH**/ ?>