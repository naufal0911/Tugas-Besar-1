<!DOCTYPE html>
<html>
<head>
	<title>Cetak Nilai</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
    </style>
	<div class="mb-3">
	<hr><width="100" height="75"></hr>
	<h1><center><font size="5" face="arial">UNIVERSITAS PADJADJARAN</font></center></h1>
	<center><b><font size="4" face="Courier New">FAKULTAS EKONOMI DAN BISNIS</font></b></center><br>
	<center><b>Jl. Dipati Ukur No.35, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132<b></center><br>
	<hr><width="100" height="75"></hr >
	</div>
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Sekolah</th>
				<th>Nama Aktivitas</th>
                <th>Tanggal Aktivitas</th>
                <th>Nilai Aktivitas</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1 ?>
			<?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($i++); ?></td>
				<td><?php echo e($item->aktivitas->siswa->nama_siswa); ?></td>
				<td><?php echo e($item->aktivitas->siswa->sekolah_siswa); ?></td>
				<td><?php echo e($item->aktivitas->nama_aktivitas); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($item->aktivitas->tanggal_aktivitas)->isoFormat('D MMMM Y')); ?></td>
                <td><?php echo e($item->nilai); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
 
</body>
</html><?php /**PATH /var/www/html/sipkl/web/resources/views/dashboard/pimdev/cetakpdf.blade.php ENDPATH**/ ?>