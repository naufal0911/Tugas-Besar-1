@extends('dashboard.layouts.main')
@section('container')

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Detail Penjualan Produk</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Customer {{ $tokoorders->first()->customer }} Tanggal {{ \Carbon\Carbon::parse($tokoorders->first()->dateshipped)->isoFormat('D MMMM Y') }}</li>
                </ol>
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-table me-1"></i>
                            Daftar Penjualan Produk
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-primary me-2 no-print" onclick="printPage()">Print</button>
                            <button class="btn btn-primary no-print" data-bs-toggle="modal" data-bs-target="#shareModal">Share</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_id" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Product ID</th>
                                        <th scope="col">Jumlah (Lusin)</th>
                                        <th scope="col" class="print-only">Jumlah (Buah)</th>
                                        <th scope="col" class="no-print">Aksi</th>
                                    </tr>
                                </thead>
                                <?php $no = 1; ?>
                                <tbody>
                                    @foreach ($tokodetail as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>No.{{ $item->productID }}</td>
                                        <td>{{ $item->jumlah }} Lusin</td>
                                        <td class="print-only">{{ $item->jumlah * 12 }} Buah</td>

                                        <td class="no-print">
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#detail{{ $item->id }}"><span class="badge bg-primary"><i class="bi bi-eye"></i></span></a>
                                        </td>
                                    </tr>
                                    {{-- Modal Detail --}}
                                    <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Pemesanan Produk Gudang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <div class="form-group">
                                                        <label for="nama_aktivitas">Product ID</label>
                                                        <input type="text" class="form-control mb-3" value="No. {{ $item->productID }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama_aktivitas">Jumlah</label>
                                                        <input type="text" class="form-control mb-3" value="{{ $item->jumlah * 12 }} buah" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- END MODAL Detail --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br><a onclick="history.back(-1)" role="button" class="no-print" style="font-size: 30px"><i class="bi bi-skip-backward-circle"></i></a>
            </div>
        </main>
    </div>
</div>

<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel">Share on Social Media</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Select a social media platform to share:</p>
                <div class="social-buttons">
                    <button class="btn btn-outline-primary" onclick="shareOnFacebook()">Facebook</button>
                    <button class="btn btn-outline-info" onclick="shareOnTwitter()">Twitter</button>
                    <button class="btn btn-outline-primary" onclick="shareOnLinkedIn()">LinkedIn</button>
                    <button class="btn btn-outline-success" onclick="shareOnWhatsApp()">WhatsApp</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printPage() {
        window.print();
    }

    function shareOnFacebook() {
        // Replace with actual URL and parameters for sharing on Facebook
        let url = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href);
        window.open(url, '_blank');
    }

    function shareOnTwitter() {
        // Replace with actual URL and parameters for sharing on Twitter
        let url = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(window.location.href) + '&text=Check%20out%20this%20awesome%20page!';
        window.open(url, '_blank');
    }

    function shareOnLinkedIn() {
        // Replace with actual URL and parameters for sharing on LinkedIn
        let url = 'https://www.linkedin.com/shareArticle?url=' + encodeURIComponent(window.location.href) + '&title=Check%20out%20this%20awesome%20page!';
        window.open(url, '_blank');
    }

    function shareOnWhatsApp() {
        // Replace with actual URL and parameters for sharing on WhatsApp
        let url = 'https://api.whatsapp.com/send?text=' + encodeURIComponent('Link: ' + window.location.href);
        window.open(url, '_blank');
    }
</script>

<style>
    @media print {
        .no-print,
        .no-print * {
            display: none !important;
        }

        .print-only {
            display: table-cell !important;
        }

        /* Hide URL path in print mode */
        a[href]:after {
            content: none !important;
        }

        /* Hide search, entries and pagination controls */
        .dataTables_filter,
        .dataTables_length,
        .dataTables_paginate {
            display: none !important;
        }
    }

    .print-only {
        display: none;
    }
</style>
@endsection
