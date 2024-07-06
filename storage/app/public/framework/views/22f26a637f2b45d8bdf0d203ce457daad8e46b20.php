<?php $__env->startSection('content'); ?>
<section id="home">
    <header class="masthead d-flex align-items-center">
    <div class="container  px-lg-5 text-center">
        <h1 style="margin-bottom:0px;">SiPKL</h1>
        <h3 ><em>Sistem Informasi Praktek Kerja Lapangan</em></h3>
        <a class="btn btn-primary btn-xl" href="#info" style="margin-bottom:200px;">Info</a>
    </div>
</header>
</section>
<section id="info" class="content-section bg-dark"">
    <div class="container px-4 px-lg-5 text-center">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-10">
                <h2>Web Laporan Aktivitas Kerja Lapangan</h2>
                <p class="lead mb-5">
                    Merupakan sebuah web yang disediakan untuk mengisi aktivitas siswa selama praktek kerja lapangan berlangsung
                </p>
                <a class="btn btn-light btn-xl" href="#services">Keunggulan</a>
            </div>
        </div>
    </div>
</section>
<section class="content-section bg-primary text-white text-center" id="services">
    <div class="container px-4 px-lg-5">
        <div class="content-section-heading">
            <h3 class="text-secondary mb-0">Keunggulan</h3>
            <h2 class="mb-5">Keunggulan Web Kami</h2>
        </div>
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-screen-smartphone"></i></span>
                <h4><strong>Flexibel</strong></h4>
                <p class="text-faded mb-0">Bisa diakses dimanapun</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
                <h4><strong>Laporan</strong></h4>
                <p class="text-faded mb-0">Mencatat kagiatan kerja lapangan</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-like"></i></span>
                <h4><strong>Membantu</strong></h4>
                <p class="text-faded mb-0">
                    Membantu para siswa yang sedang pkl
                </p>
            </div>
            <div class="col-lg-3 col-md-6">
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-mustache"></i></span>
                <h4><strong>Pertanyaan</strong></h4>
                <p class="text-faded mb-0">Silakan bertanya jika bingung</p>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applications\web\resources\views/coba.blade.php ENDPATH**/ ?>