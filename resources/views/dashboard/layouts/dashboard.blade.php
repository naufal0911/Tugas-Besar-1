<div id="layoutSidenav">
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- User Gudang --}}
                @if (Auth::user()->group_id == 3 )
                <div class="sb-sidenav-menu-heading">Utama</div>
                <a class="nav-link {{ Request::is('Dashboard') ? 'active' : '' }}" href="{{url('/Dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Transaksi</div>
                <a class="nav-link {{ Request::is('Dashboard/pembelianproduk') ? 'active' : '' }}" href="{{url('/Dashboard/pembelianproduk')}}">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart-plus"></i></div>
                    Pembelian Produk
                </a>
                <a class="nav-link {{ Request::is('Dashboard/pemesananproduk') ? 'active' : '' }}" href="{{url('/Dashboard/pemesananproduk')}}">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart-check"></i></div>
                    Pemesanan Produk
                </a>
                <div class="sb-sidenav-menu-heading">Stok</div>
                <a class="nav-link {{ Request::is('Dashboard/stokgudang') ? 'active' : '' }}" href="{{url('/Dashboard/stokgudang')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-warehouse"></i></i></div>
                    Gudang
                </a>
                <a class="nav-link {{ Request::is('Dashboard/stoktoko') ? 'active' : '' }}" href="{{url('/Dashboard/stoktoko')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-store"></i></i></div>
                    Toko
                </a>
            <div class="sb-sidenav-menu-heading">Riwayat</div>
            <a class="nav-link {{ Request::is('Dashboard/daftarpembelianproduk') ? 'active' : '' }}" href="{{url('/Dashboard/daftarpembelianproduk')}}">
                <div class="sb-nav-link-icon"><i class="bi bi-cart-plus-fill"></i></div>
                Pembelian Produk
            </a>
            <a class="nav-link {{ Request::is('Dashboard/gudang/daftarpemesananproduk') ? 'active' : '' }}" href="{{url('/Dashboard/gudang/daftarpemesananproduk')}}">
                <div class="sb-nav-link-icon"><i class="bi bi-cart-check-fill"></i></div>
                Pemesanan Produk
            </a>
        </div>
                {{-- END User Gudang --}}
                {{-- ADMIN --}}
                @elseif (Auth::user()->group_id == 1 )
                <div class="sb-sidenav-menu-heading">Utama</div>
                <a class="nav-link {{ Request::is('Dashboard') ? 'active' : '' }}" href="{{url('/Dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" ></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed {{ Request::is('Dashboard/master/daftaruser') ? 'active' : '' }} {{ Request::is('Dashboard/master/daftarproduk') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#sss" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                    Master Data
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="sss" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('Dashboard/master/daftaruser') ? 'active' : '' }}" href="{{url('/Dashboard/master/daftaruser')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                            Data User
                        </a>
                        <a class="nav-link {{ Request::is('Dashboard/master/daftarproduk') ? 'active' : '' }}" href="{{url('/Dashboard/master/daftarproduk')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-shirt"></i></div>
                            Data Produk
                        </a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Pendaftaran</div>
                <a class="nav-link {{ Request::is('Dashboard/pendaftaranuser') ? 'active' : '' }}" href="{{url('/Dashboard/pendaftaranuser')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                    Pendaftaran User
                </a>
                <a class="nav-link {{ Request::is('Dashboard/pendaftaranproduk') ? 'active' : '' }}" href="{{url('/Dashboard/pendaftaranproduk')}}">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart-plus"></i></div>
                    Pendaftaran Produk
                </a>
                <div class="sb-sidenav-menu-heading">Transaksi</div>
                <a class="nav-link collapsed {{ Request::is('Dashboard/pemesananproduk') ? 'active' : '' }} {{ Request::is('Dashboard/pembelianproduk') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#gudang" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-warehouse"></i></i></div>
                    Gudang
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="gudang" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('Dashboard/pembelianproduk') ? 'active' : '' }}" href="{{url('/Dashboard/pembelianproduk')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-cart-plus"></i></div>
                            Pembelian
                        </a>
                        <a class="nav-link {{ Request::is('Dashboard/pemesananproduk') ? 'active' : '' }}" href="{{url('/Dashboard/pemesananproduk')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-cart-check"></i></div>
                            Pemesanan
                        </a>
                    </nav>
                </div>
                <a class="nav-link collapsed {{ Request::is('Dashboard/toko/pemesananproduk') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-shop"></i></div>
                    Toko
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('Dashboard/toko/pemesananproduk') ? 'active' : '' }}" href="{{url('/Dashboard/toko/pemesananproduk')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-cart-check"></i></div>
                            Penjualan
                        </a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading ">Daftar</div>
                <a class="nav-link collapsed {{ Request::is('Dashboard/daftaruser') ? 'active' : '' }} {{ Request::is('Dashboard/daftarproduk') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#sss" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                    Daftar
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="sss" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('Dashboard/daftaruser') ? 'active' : '' }}" href="{{url('/Dashboard/daftaruser')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                            Daftar User
                        </a>
                        <a class="nav-link {{ Request::is('Dashboard/daftarproduk') ? 'active' : '' }}" href="{{url('/Dashboard/daftarproduk')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-shirt"></i></div>
                            Daftar Produk
                        </a>
                    </nav>
                </div>
                <a class="nav-link collapsed {{ Request::is('Dashboard/stokgudang') ? 'active' : '' }} {{ Request::is('Dashboard/stoktoko') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#stok" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-truck"></i></div>
                    Stok
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="stok" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('Dashboard/stokgudang') ? 'active' : '' }}" href="{{url('/Dashboard/stokgudang')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-warehouse"></i></i></div>
                            Gudang
                        </a>
                        <a class="nav-link {{ Request::is('Dashboard/stoktoko') ? 'active' : '' }}" href="{{url('/Dashboard/stoktoko')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-shop"></i></div>
                            Toko
                        </a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Riwayat</div>
                <a class="nav-link collapsed {{ Request::is('Dashboard/daftarpembelianproduk') ? 'active' : '' }} {{ Request::is('Dashboard/gudang/daftarpemesananproduk') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#gudangr" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-warehouse"></i></div>
                    Gudang
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="gudangr" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('Dashboard/daftarpembelianproduk') ? 'active' : '' }}" href="{{url('/Dashboard/daftarpembelianproduk')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-cart-check"></i></div>
                            Pembelian
                        </a>
                        <a class="nav-link {{ Request::is('Dashboard/gudang/daftarpemesananproduk') ? 'active' : '' }}" href="{{url('/Dashboard/gudang/daftarpemesananproduk')}}">
                        <div class="sb-nav-link-icon"><i class="bi bi-cart-plus"></i></div>
                        Pemesanan
                        </a>
                    </nav>
                </div>
                <a class="nav-link collapsed {{ Request::is('Dashboard/daftarpemesananproduk') ? 'active' : '' }} {{ Request::is('Dashboard/toko/daftarpenjualanproduk') ? 'active' : '' }} {{ Request::is('Dashboard/toko/daftarpenjualan/detail*') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsr" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-shop"></i></div>
                    Toko
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayoutsr" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('Dashboard/toko/daftarpenjualanproduk*') ? 'active' : '' }}" href="{{url('/Dashboard/toko/daftarpenjualanproduk')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-cart-check"></i></div>
                            Penjualan
                        </a>
                    </nav>
                </div>
            </div>
                {{-- END ADMIN --}}
                {{-- User Toko --}}
                @elseif (Auth::user()->group_id == 2 )
                <div class="sb-sidenav-menu-heading">Utama</div>
                <a class="nav-link {{ Request::is('Dashboard') ? 'active' : '' }}" href="{{url('/Dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" ></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Transaksi</div>
                <a class="nav-link {{ Request::is('Dashboard/toko/pemesananproduk') ? 'active' : '' }}" href="{{url('/Dashboard/toko/pemesananproduk')}}">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart-check"></i></div>
                    Pemesanan Produk
                </a>
                <div class="sb-sidenav-menu-heading">Stok</div>
                <a class="nav-link {{ Request::is('Dashboard/stokgudang') ? 'active' : '' }}" href="{{url('/Dashboard/stokgudang')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-warehouse"></i></i></div>
                    Gudang
                </a>
                <a class="nav-link {{ Request::is('Dashboard/stoktoko') ? 'active' : '' }}" href="{{url('/Dashboard/stoktoko')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-store"></i></i></div>
                    Toko
                </a>
                <div class="sb-sidenav-menu-heading">Riwayat</div>
                <a class="nav-link {{ Request::is('Dashboard/toko/daftarpenjualanproduk*') ? 'active' : '' }}" href="{{url('/Dashboard/toko/daftarpenjualanproduk')}}">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart-check"></i></div>
                    Pemesanan Produk
                </a>
            </div>
                {{-- END User Toko --}}
            @endif
        </div>
        
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->group->nama_group }}
        </div>
    </nav>
</div>
