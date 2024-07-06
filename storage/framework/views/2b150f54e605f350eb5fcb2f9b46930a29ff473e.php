<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Most Label | <?php echo e($title); ?></title>
        <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        


  <style type="text/css">
            .preloader {
              position: fixed;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              z-index: 9999;
              background-color: #fff;
            }
            .preloader .loading {
              position: absolute;
              left: 50%;
              top: 50%;
              transform: translate(-50%,-50%);
              font: 14px arial;
            }
            </style>
            <script>
                $(document).ready(function(){
                $(".preloader").fadeOut();
                })
                </script>
    </head>
    <body class="sb-nav-fixed">
        <div class="preloader">
            <div class="loading">
              <img src="/img/asdad.gif">
            </div>
          </div>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="">Most Label</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">


            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <?php if(Auth::user()->group_id == 4): ?>
                        <li><a class="dropdown-item" href="<?php echo e(url('/Dashboard/profile')); ?>" role="button"><i class="bi bi-person" style="margin-left: 25px"></i>Profile</a></li>
                        <?php endif; ?>
                        
                        <form action="<?php echo e(url('/Logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?> 
                        <li><button type="submit" class="dropdown-item"></i><i class="bi bi-power" style="margin-left: 25px"></i>Logout</button></li>
                        </form>
                    </ul>
                </li>
            </ul>
        </nav>


        
<?php echo $__env->make('dashboard.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container"> 
    <?php echo $__env->yieldContent('container'); ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#table_id').DataTable();
} );
</script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('/js/scripts.js')); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('/js/chart/Chart.bundle.js ')); ?>"></script>
        <script src="<?php echo e(asset('/js/chart/Chart.bundle.min.js ')); ?>"></script>
        <script src="<?php echo e(asset('/js/chart/Chart.js ')); ?>"></script>
        <script src="<?php echo e(asset('/js/chart/Chart.js ')); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('/js/datatables-simple-demo.js')); ?>"></script>
        

        
    </body>
</html><?php /**PATH C:\Users\Acer\Downloads\web\resources\views/dashboard/layouts/main.blade.php ENDPATH**/ ?>