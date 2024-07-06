<?php $__env->startSection('content'); ?>
<section id="home">
    <header class="masthead d-flex align-items-center">
    <div class="container  px-lg-5 text-center">
        <?php if(session()->has('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo e(session('error')); ?>

        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php elseif(session()->has('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php endif; ?>
        <h1 style="margin-bottom:0px;">SiPKL</h1>
        <h3 ><em>Sistem Informasi Praktek Kerja Lapangan</em></h3>
        <a class="btn btn-outline-primary btn-xl" href="#info" style="margin-bottom:200px;">Info</a>
        <a class="btn btn-outline-success btn-xl" data-toggle="modal" data-target="#exampleModal" style="margin-bottom:200px; margin-left:50px;">Login</a>
        <a class="btn btn-outline-dark btn-xl" data-toggle="modal" data-target="#register" style="margin-bottom:200px; margin-left:50px;">Register</a>
        <a class="btn btn-outline-danger btn-xl" data-toggle="modal" data-target="#forgotpassword" style="margin-bottom:200px; margin-left:50px;">Forgot Password</a>
    </div>
          
          <div class="modal fade" id="forgotpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
                  <button type="button" class="btn-close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control mb-3 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email" value="<?php echo e(old('email')); ?>" required>
                            <?php $__errorArgs = ['email'];
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
                                    <?php echo e(__('Send Password Reset Link')); ?>

                                </button>
                    </form>
                </div>
              </div>
            </div>
      </div>
      
            
            <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                      <button type="button" class="btn-close" data-dismiss="modal"></button>
                      <div class="alert alert-danger" style="display:none"></div>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo e(url('/Register')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control mb-3 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" placeholder="Masukkan Nama" value="<?php echo e(old('name')); ?>" required autofocus>
                                <?php $__errorArgs = ['name'];
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
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control mb-3 <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username" placeholder="Masukkan username" value="<?php echo e(old('username')); ?>" required>
                                <?php $__errorArgs = ['username'];
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
                                <label for="nama_sekolah">Nama Sekolah</label>
                                <input type="text" id="nama_sekolah" class="form-control mb-3 <?php $__errorArgs = ['nama_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nama_sekolah" placeholder="Masukkan Nama Sekolah" value="<?php echo e(old('nama_sekolah')); ?>" required>
                                <?php $__errorArgs = ['nama_sekolah'];
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
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control mb-3 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email" value="<?php echo e(old('email')); ?>" required>
                                <?php $__errorArgs = ['email'];
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
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control mb-3 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" aria-describedby="emailHelp" placeholder="Masukkan Password" required>
                                <?php $__errorArgs = ['password'];
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
                                        Register
                                    </button>
                        </form>
                    </div>
                  </div>
                </div>
          </div>
          
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login</h5>
              <button type="button" class="btn-close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(url('/Login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 mb-2 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control mb-2 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="Masukkan Email"  autocomplete="email" autofocus required>

                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 mb-3 col-form-label text-md-right">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control mb-2 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Masukkan Password"  autocomplete="current-password" required>

                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-outline-success">
                                Login
                            </button>
                            
                            </button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>



</header>
</section>
<section id="info" class="content-section bg-dark"">
    <div class="container px-4 px-lg-5 text-center">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-10">
                <h2>Web Laporan Aktivitas Kerja Lapangan</h2>
                <p class="lead mb-5">
                    Merupakan Sebuah Web Yang Disediakan Untuk Mengisi Aktivitas Siswa Selama Praktek Kerja Lapangan Berlangsung
                </p>
                <a class="btn btn-light btn-xl" href="#services">Kegunaan</a>
            </div>
        </div>
    </div>
</section>
<section class="content-section bg-primary text-white text-center" id="services">
    <div class="container px-4 px-lg-5">
        <div class="content-section-heading">
            <h3 class="text-secondary mb-0">Kegunaan</h3>
            <h2 class="mb-5">Kegunaan SIPKL</h2>
        </div>
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="bi bi-file-pdf"></i></span>
                <h4><strong>Cetak Nilai</strong></h4>
                <p class="text-faded mb-0">Bisa Mencetak Nilai</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="bi bi-pencil-fill"></i></span>
                <h4><strong>Laporan</strong></h4>
                <p class="text-faded mb-0">Mencatat Kagiatan Kerja Lapangan</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="bi bi-sunglasses"></i></span>
                <h4><strong>Guru</strong></h4>
                <p class="text-faded mb-0">
                    Membantu Guru Untuk Memantau Siswa Yang Sedang PKL
                </p>
            </div>
            <div class="col-lg-3 col-md-6">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="bi bi-question-circle-fill"></i></span>
                <h4><strong>Pertanyaan</strong></h4>
                <p class="text-faded mb-0">Silakan Kontak Kami Jika Ada Pertanyaan</p>
            </div>
        </div>
    </div>
</section>
<button onclick="topFunction()" id="myBtn" title="Go to top">Back To Top</button>
    <script>
     
    // fungsi ketika user men scroll ke bawah 20 px maka tombol back to top akan muncul
     
    window.onscroll = function() {scrollFunction()};
     
     
    function scrollFunction() {
     
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
     
            document.getElementById("myBtn").style.display = "block";
     
        } else {
     
            document.getElementById("myBtn").style.display = "none";
     
        }
     
    }
     
    // fungsi ketika user meng klik tombol back to top maka halaman akan menscroll ke atas
     
     
    function topFunction() {
     
        document.body.scrollTop = 0;
     
        document.documentElement.scrollTop = 0;
     
    }
     
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sipkl/web/resources/views/coba.blade.php ENDPATH**/ ?>