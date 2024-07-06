<div id="layoutSidenav">
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                
                <?php if(Auth::user()->group_id == 3 ): ?>
                <div class="sb-sidenav-menu-heading">Utama</div>
                <a class="nav-link <?php echo e(Request::is('Dashboard') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Transaksi</div>
                <a class="nav-link <?php echo e(Request::is('Dashboard/pembelianproduk') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pembelianproduk')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart-plus"></i></div>
                    Pembelian Produk
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/pemesananproduk') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pemesananproduk')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart-check"></i></div>
                    Pemesanan Produk
                </a>
                <div class="sb-sidenav-menu-heading">Stok</div>
                <a class="nav-link <?php echo e(Request::is('Dashboard/stokgudang') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/stokgudang')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart4"></i></div>
                    Gudang
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/stoktoko') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/stoktoko')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart4"></i></div>
                    Toko
                </a>
            <div class="sb-sidenav-menu-heading">Riwayat</div>
            <a class="nav-link <?php echo e(Request::is('Dashboard/daftarpembelianproduk') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/daftarpembelianproduk')); ?>">
                <div class="sb-nav-link-icon"><i class="bi bi-cart-plus-fill"></i></div>
                Pembelian Produk
            </a>
            <a class="nav-link <?php echo e(Request::is('Dashboard/daftarpemesananproduk') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/daftarpemesananproduk')); ?>">
                <div class="sb-nav-link-icon"><i class="bi bi-cart-check-fill"></i></div>
                Pemesanan Produk
            </a>
        </div>
                
                
                <?php elseif(Auth::user()->group_id == 1 ): ?>
                <div class="sb-sidenav-menu-heading">Utama</div>
                <a class="nav-link <?php echo e(Request::is('Dashboard') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" ></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Pendaftaran</div>
                <a class="nav-link <?php echo e(Request::is('Dashboard/pendaftaranuser') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pendaftaranuser')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                    Pendaftaran User
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/pendaftaranproduk') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pendaftaranproduk')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart-plus"></i></div>
                    Pendaftaran Produk
                </a>
                <div class="sb-sidenav-menu-heading">Transaksi</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Toko
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?php echo e(Request::is('Dashboard/pembelianproduk') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pembelianproduk')); ?>">
                            <div class="sb-nav-link-icon"><i class="bi bi-cart-plus"></i></div>
                            Pembelian
                        </a>
                        <a class="nav-link <?php echo e(Request::is('Dashboard/pemesananproduk') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/pemesananproduk')); ?>">
                            <div class="sb-nav-link-icon"><i class="bi bi-cart-check"></i></div>
                            Pemesanan
                        </a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Daftar</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#sss" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Daftar
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="sss" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?php echo e(Request::is('Dashboard/daftaruser') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/daftaruser')); ?>">
                            <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                            Daftar User
                        </a>
                        <a class="nav-link <?php echo e(Request::is('Dashboard/daftarproduk') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/daftarproduk')); ?>">
                            <div class="sb-nav-link-icon"><i class="bi bi-cart2"></i></div>
                            Daftar Produk
                        </a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#stok" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Stok
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="stok" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?php echo e(Request::is('Dashboard/stokgudang') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/stokgudang')); ?>">
                            <div class="sb-nav-link-icon"><i class="bi bi-cart4"></i></div>
                            Gudang
                        </a>
                        <a class="nav-link <?php echo e(Request::is('Dashboard/stoktoko') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/stoktoko')); ?>">
                            <div class="sb-nav-link-icon"><i class="bi bi-cart4"></i></div>
                            Toko
                        </a>
                    </nav>
                </div>
            </div>
                
                
                <?php elseif(Auth::user()->group_id == 2 ): ?>
                <div class="sb-sidenav-menu-heading">Utama</div>
                <a class="nav-link <?php echo e(Request::is('Dashboard') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" ></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Transaksi</div>
                <a class="nav-link <?php echo e(Request::is('Dashboard/toko/pemesananproduk') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/toko/pemesananproduk')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart-check"></i></div>
                    Pemesanan Produk
                </a>
                <div class="sb-sidenav-menu-heading">Stok</div>
                <a class="nav-link <?php echo e(Request::is('Dashboard/stokgudang') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/stokgudang')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart4"></i></div>
                    Gudang
                </a>
                <a class="nav-link <?php echo e(Request::is('Dashboard/stoktoko') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/stoktoko')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart4"></i></div>
                    Toko
                </a>
                <div class="sb-sidenav-menu-heading">Riwayat</div>
                <a class="nav-link <?php echo e(Request::is('Dashboard/stokgudang') ? 'active' : ''); ?>" href="<?php echo e(url('/Dashboard/stokgudang')); ?>">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart-check"></i></div>
                    Pemesanan Produk
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
<?php /**PATH C:\Users\Acer\Downloads\web\resources\views/dashboard/layouts/dashboard.blade.php ENDPATH**/ ?>