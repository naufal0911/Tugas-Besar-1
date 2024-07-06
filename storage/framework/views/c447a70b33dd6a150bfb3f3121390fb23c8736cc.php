

<?php $__env->startSection('container'); ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <h1 class="mt-4" style="margin-bottom: 40px">Penjualan Produk</h1>
            <div class="card mb-4">
                <div class="card-header"><i class="fa-solid fa-shop"></i>
                    Penjualan Produk Ke Customer
                </div>
                <div class="card-body">
                    <?php if(session()->has('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php elseif(session()->has('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo e(session('error')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    <form action="<?php echo e(url('/Dashboard/toko/pemesananproduk')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="dateshipped"> <strong>Tanggal Dikirim</strong> </label>
                            <input type="date" class="form-control mb-3 <?php $__errorArgs = ['dateshipped'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="dateshipped" style="width: 80%" placeholder="Masukkan Tanggal Diterima" value="<?php echo e(old('dateshipped')); ?>" required>
                            <?php $__errorArgs = ['dateshipped'];
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
                        <div class="form-group">
                            <label for="customer"> <Strong>Customer</Strong> </label>
                            <input type="text" class="form-control mb-3 <?php $__errorArgs = ['customer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="customer" style="width: 80%" aria-describedby="customerHelp" placeholder="Masukkan Nama customer" value="<?php echo e(old('customer')); ?>" required>
                            <?php $__errorArgs = ['customer'];
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

                        <table class="table" id="products_table">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Jumlah Available</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="product0">
                                    <td>
                                        <select name="productIDD[]" class="form-control product-select">
                                            <option disabled selected value> -- Pilih ProductID -- </option>
                                            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->productID); ?>"><?php echo e($item->productID); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control available" name="available[]" readonly>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" class="form-control mb-3 <?php $__errorArgs = ['jumlah_detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="jumlah_detail[]" style="width: 50%" aria-describedby="jumlahHelp" placeholder="Masukkan Jumlah Barang /Lusin" value="<?php echo e(old('jumlah_detail')); ?>" required>
                                    </td>
                                </tr>
                                <tr id="product1"></tr>
                            </tbody>
                        </table>
                        <button id="add_row" class="btn btn-success pull-left">+ Add Row</button>
                        <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function () {
                            let row_number = 1;
                            $("#add_row").click(function (e) {
                                e.preventDefault();
                                let new_row_number = row_number - 1;
                                $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
                                
                                // Reset the selected option
                                $('#product' + row_number + ' .product-select').val(null);
                                
                                $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
                                row_number++;
                            });

                            $("#delete_row").click(function (e) {
                                e.preventDefault();
                                if (row_number > 1) {
                                    $("#product" + (row_number - 1)).html('');
                                    row_number--;
                                }
                            });

                            // AJAX call to get product details
                            $(document).on('change', '.product-select', function () {
                                let productID = $(this).val();
                                let row = $(this).closest('tr');

                                if (productID) {
                                    $.ajax({
                                        url: '/Dashboard/toko/getProductDetails/' + productID,
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function (data) {
                                            row.find('.available').val(data.available);
                                        },
                                        error: function () {
                                            console.log('Error retrieving product details');
                                        }
                                    });
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </main>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ujicoba\web\resources\views/dashboard/toko/pemesananproduk.blade.php ENDPATH**/ ?>