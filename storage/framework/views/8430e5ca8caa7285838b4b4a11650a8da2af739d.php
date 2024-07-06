<div id="layoutSidenav">
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                
                <?php if(Auth::user()->group_id == 3 ): ?>
                <div class="sb-sidenav-menu-heading">Guru</div>
                <a class="nav-link <?php echo e(Request::is('Dashboard') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/daftarpkl') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/daftarpkl')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                    Daftar Pkl
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/persetujuanpkl*') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/persetujuanpkl')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-list-ul"></i></div>
                    Persetujuan Pkl
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/pendaftaransiswa') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pendaftaransiswa')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-plus" ></i></div>
                    Pendaftaran Siswa
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/daftarsiswa') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/daftarsiswa')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                    Daftar Siswa
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/daftarkegiatansiswa') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/daftarkegiatansiswa')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-list-ol"></i></div>
                    Daftar Kegiatan Siswa
                </a>
 
                <a class="nav-link <?php echo e(Request::is('Dashboard/daftarnilaisiswa') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/daftarnilaisiswa')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-list-ol"></i></div>
                    Daftar Nilai Siswa
                </a>
            </div>
                
                
                <?php elseif(Auth::user()->group_id == 1 ): ?>
                <div class="sb-sidenav-menu-heading">Admin</div>
                <a class="nav-link <?php echo e(Request::is('Dashboard') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" ></i></div>
                    Dashboard
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/pendaftaranuser') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pendaftaranuser')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                    Pendaftaran User
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/daftaruser') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/daftaruser')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                    Daftar User
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/pkl*') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pkl')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-house-door"></i></div>
                    Stok Gudang
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/pkl*') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pkl')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-house-door"></i></div>
                    Stok Toko
                </a>
            </div>
                
                
                <?php elseif(Auth::user()->group_id == 2 ): ?>
                <div class="sb-sidenav-menu-heading">Staff Admin</div>
                <a class="nav-link <?php echo e(Request::is('Dashboard') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" ></i></div>
                    Dashboard
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/pkl*') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pkl')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-list-ul"></i></div>
                    PKL
                </a>
            </div>
                
                
                <?php elseif(Auth::user()->group_id == 4 ): ?>
                <div class="sb-sidenav-menu-heading">Siswa</div>
                <a class="nav-link <?php echo e(Request::is('Dashboard') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Dashboard
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/jadwalpkl*') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/jadwalpkl')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-calendar3"></i></div>
                    Jadwal PKL
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/aktivitaspkl*') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/aktivitaspkl')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-list-ul"></i></div>
                    Daftar Aktivitas
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/siswa/daftarnilai*') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/siswa/daftarnilai')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-list-ul"></i></div>
                    Daftar Nilai
                </a>
            </div>
                
                
                <?php elseif(Auth::user()->group_id == 5 ): ?>
                <div class="sb-sidenav-menu-heading">Pimpinan Devisi</div>
                <a class="nav-link <?php echo e(Request::is('Dashboard') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/pimdev/daftarsiswa') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pimdev/daftarsiswa')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                    Daftar Siswa
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/pimdev/daftarkegiatan') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pimdev/daftarkegiatan')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-list-ol"></i></div>
                    Daftar Kegiatan
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/pimdev/daftarnilai') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pimdev/daftarnilai')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-list-ol"></i></div>
                    Daftar Nilai
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/pimdev/cetaknilai') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pimdev/cetaknilai')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-file-earmark-pdf"></i></div>
                    Cetak Nilai
                </a>
                
            </div>
            <?php endif; ?>
        </div>
        
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php echo e(auth()->user()->group->nama_group); ?>

        </div>
    </nav>
</div>
<?php /**PATH D:\web\resources\views/dashboard/layouts/dashboard.blade.php ENDPATH**/ ?>