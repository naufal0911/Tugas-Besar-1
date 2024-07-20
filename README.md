# Sistem Manajemen Inventaris Barang (SIMBAR)

<img src="/readme/Home.png" width="300" height="300">

Sistem Manajamen Inventaris Barang yang bisa disingkat dengan SIMBAR adalah sebuah aplikasi berbasis webstie yang akan membantu pengguna untuk mengelola inventaris barang sesuai dengan kebutuhannya masing - masing. 

Pada aplikasi yang saya buat ini saya mengambil contoh untuk kebutuhan sebuah perusahaan textil baju yang ingin memanajemen inventaris barang berupa baju dari gudang ke toko dan ke penjual.

## Role Pengguna

Pada aplikasi SIMBAR terdapat 3 role aplikasi yang bisa pengguna gunakan, yaitu :

1. Admin
Role admin disini berguna untuk mengatur apa saja yang ada di dalam aplikasi SIMBAR ini. Admin dapat menambah, mengurangi, mengedit, dan melihat semua fitur seperti : 
    - Data User 
    - Data Produk
    - Transaksi Pembelian Gudang
    - Transaksi Pemesanan Gudang ke Toko
    - Transaksi Penjualan Toko ke Penjual
    - Data Stok Gudang
    - Data Stok Toko
    - Riwayat Pembelian Gudang
    - Riwayat Pemesanan Gudang ke Toko
    - Riwayat Penjualan Toko ke Penjual
2. User Gudang
Role user gudang disini memiliki beberapa hak akses seperti :
    - Melakukan Transaksi Pembelian Gudang
    - Melakukan Transaksi Pemesanan Gudang ke Toko
    - Melihat Stok Toko
    - Melihat Stok Gudang
    - Melihat Riwayat Pembelian Gudang
    - Melihat Riwayat Pemesanan Gudang ke Toko
3. User Toko
Role user toko disini memiliki beberapa hak akses seperti :
    - Melakukan transaksi Penjualan Barang ke Penjual
    - Melihat Stok Gudang
    - Melihat Stok Toko
    - Melihatan Riwayat Penjualan Barang ke Penjual

## Alur Kerja Aplikasi

Aplikasi SIMBAR memiliki alur kerja yang dimana seperti perusahaan ingin memanajemen barang semestinya, untuk aplikasi ini akan saya jelaskan alur kerja dari awal sampai akhir aplikasi SIMBAR berjalan.

1. Pendaftaran Produk

Pendaftaran Produk merupakan alur dimana admin dari aplikasi SIMBAR akan memasukan daftar produk apa saja yang ada di perusahaan mereka.

Pada aplikasi SIMBAR sendiri untuk admin sudah bisa memanajemen master data produknya.
<img src="/readme/PendaftaranProduk/1.png" width="600" height="300">

Apabila ingin menambahkan tinggal di klik "Tambah Produk", lalu tambahkan produk sesuai keinginan seperti dibawah ini.

<img src="/readme/PendaftaranProduk/2.png" width="600" height="300">

Aplikasi Simbar pun akan mengirim email kepada admin yang mendaftarkan produk tersebut.
<img src="/readme/PendaftaranProduk/3.png" width="600" height="300">

2. Pembelian Stok Barang di Gudang Melalui Supplier

Pertama untuk pembelian stok barang di gudang ini bisa dilakukan oleh Admin ataupun User Gudang. 

Sekarang saya coba untuk simulasikan melalui User Gudang apabila ada pembelian melalui supplier.
<img src="/readme/Pembelian Stok Barang di Gudang Melalui Supplier/1.png" width="600" height="300">

Apabila sudah maka Stok di Gudang akan bertambah seperti berikut
<img src="/readme/Pembelian Stok Barang di Gudang Melalui Supplier/2.png" width="600" height="300">
<img src="/readme/Pembelian Stok Barang di Gudang Melalui Supplier/3.png" width="300" height="300">

3. Pemesanan Stok Barang ke Toko

Pemesanan stok barang ke Toko ini bisa dilakukan oleh Admin ataupun User Gudang. 

Sekarang saya coba untuk simulasikan melalui User Gudang apabila ada pemesanan stok barang ke toko.
<img src="/readme/Pemesanan Stok Barang ke Toko/1.png" width="600" height="300">

Apabila sudah kita bisa cek stok toko nya akan bertambah.
<img src="/readme/Pemesanan Stok Barang ke Toko/2.png" width="600" height="300">
<img src="/readme/Pemesanan Stok Barang ke Toko/3.png" width="300" height="300">

dan untuk stok gudang pun akan berkurang karena sudah diberikan ke toko.
<img src="/readme/Pemesanan Stok Barang ke Toko/4.png" width="600" height="300">
<img src="/readme/Pemesanan Stok Barang ke Toko/5.png" width="300" height="300">

4. Penjualan dari Toko ke Penjual

Penjualan ini bisa dilakukan oleh Admin ataupun User Toko. 

Sekarang saya akan coba untuk simulasikan melalui User Toko apabila ada penjual yang ingin membeli barang.
<img src="/readme/Penjualan dari Toko ke Penjual/1.png" width="600" height="300">

Apabila sudah kita bisa riwayat penjualan produk dan detailnya.
<img src="/readme/Penjualan dari Toko ke Penjual/2.png" width="600" height="300">
<img src="/readme/Penjualan dari Toko ke Penjual/3.png" width="600" height="300">

Untuk detail penjualan produknya bisa di print dan di share juga.
<img src="/readme/Penjualan dari Toko ke Penjual/4.png" width="600" height="300">
<img src="/readme/Penjualan dari Toko ke Penjual/5.png" width="600" height="300">
<img src="/readme/Penjualan dari Toko ke Penjual/6.png" width="600" height="300">

## Fitur Tambahan

Pada aplikasi SIMBAR terdapat beberapa fitur tambahan seperti : 

1. Login with Google

Pada aplikasi SIMBAR pengguna sudah bisa login melalui akun Google mereka sendiri. Namun apabila pengguna belum memiliki akun di dalam aplikasi tersebut, maka pengguna akan otomatis menggunakan role user toko.

2. API Swagger

Aplikasi SIMBAR mempunyai dokumentasi API untuk mempermudah para developer apabila ingin menguji aplikasi SIMBAR ini.

<img src="/readme/Fitur Tambahan/1.png" width="600" height="300">
