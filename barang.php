<div class="row">
	<div class="col-xs-12 mt-1 mb-3">
		<h4 class="">
			Data Barang
		</h4>
		<p>
			Admin dapat me-manage data barang disini.
		</p>
		<hr>
	</div>
	<div class="col-xs-12">
	</div>
</div>
<br>
<link rel="stylesheet" type="text/css" href="assets/style.css">
<div class="row" style="margin-top: -30px;">
	<div class="col-12">
		<div class="card">
			<div class="container">
				<div class="card-body">
					<button class="btn btn-outline-primary pull-right" data-toggle="modal" data-target="#tambah">Tambah barang</button>
					<div class="table-responsive m-t-40" style="margin-bottom: 15px;">
						<table cellspacing="0" class="display nowrap table table-hover table-striped table-bordered tableku" width="100%">
							<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Kode Barang
									</th>
									<th>
										Nama Barang
									</th>
									<th>
										Satuan
									</th>
									<th>
										Stok
									</th>
									<th>
										Status
									</th>
									<th class="text-center">
										Aksi
									</th>
								</tr>
							</thead>
							<tbody id="isi">
								<?php 
								$barang = mysqli_query($koneksi,"select * from barang order by id_barang desc");
								$no = 0;
								while ($data = mysqli_fetch_array($barang)) {
									$no++;
									?>
									<tr>
										<td><?php echo $no ?></td>
										<td><?php echo $data['kd_barang'] ?></td>
										<td><?php echo $data['nm_barang'] ?></td>
										<td><?php echo $data['satuan'] ?></td>
										<td><?php echo $data['stok'] ?></td>
										<td><?php echo $data['status'] ?></td>
										<td>
											<button class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#update<?php echo $data['id_barang'] ?>"><i data-toggle="tooltip" title="Update barang" class="fa fa-edit"></i></button>
											<a href="?p=db&act=del&id=<?php echo $data['id_barang'] ?>" onclick="return confirm('Hapus data barang?')" class="btn btn-outline-danger btn-block" data-toggle="tooltip" title="Hapus barang"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
if (@$_GET['act']!==null) {
	if (@$_GET['id']!==null) {
		mysqli_query($koneksi,"delete from barang where id_barang = '$_GET[id]'");
		?>
		<script>
			alert(' Data barang telah di hapus!');
			window.location.href="admin.php?p=db";
		</script>
		<?php
	}
}

$barang = mysqli_query($koneksi,"select * from barang");
$no = 0;
while ($data = mysqli_fetch_array($barang)) {
	?>
	<div class="modal fade text-xs-left" id="update<?php echo $data['id_barang'] ?>"  role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
		<div class="modal-dialog " role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel1">Update barang</h4>
				</div>
				<form method="post" action="updbarang.php?id=<?php echo $data['id_barang'] ?>">
					<div class="modal-body">
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label>Kode barang</label>
									<input type="text" class="form-control" autocomplete="off" value="<?php echo $data['kd_barang'] ?>" placeholder="Masukan kode barang" name="kd_barang" required="">
								</div>
								<div class="form-group">
									<label>Nama barang</label>
									<input type="text" class="form-control" autocomplete="off" value="<?php echo $data['nm_barang'] ?>" placeholder="Masukan nama barang" name="nm_barang" required="">
								</div>
								<div class="form-group">
									<label>Satuan</label>
									<input type="text" class="form-control" autocomplete="off" value="<?php echo $data['satuan'] ?>" placeholder="Masukan Satuan Barang" name="satuan" required="">
								</div>
								<div class="form-group">
									<label>Status</label>
									<input type="text" class="form-control" autocomplete="off" value="<?php echo $data['status'] ?>" placeholder="Masukan Status barang" name="status" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
						<button type="submit" id="btn1" class="btn btn-outline-primary">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
}
?>

<div class="modal fade text-xs-left" id="tambah"  role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel1">Tambah barang</h4>
			</div>
			<form method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label>Kode barang</label>
								<input type="text" class="form-control" autocomplete="off" placeholder="Masukan kode barang" name="kd_barang" required="">
							</div>
							<div class="form-group">
								<label>Nama barang</label>
								<input type="text" class="form-control" autocomplete="off" placeholder="Masukan nama barang" name="nm_barang" required="">
							</div>
							<div class="form-group">
								<label>Satuan</label>
								<input type="text" class="form-control" autocomplete="off" placeholder="Masukan Satuan Barang" name="satuan" required="">
							</div>
							<div class="form-group">
								<label>Status</label>
								<input type="text" class="form-control" autocomplete="off" placeholder="Masukan Status barang" name="status" required="">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
					<button name="tambah" id="btn" class="btn btn-outline-primary">Tambah </button>
				</div>
			</form>
		</div>
	</div>
</div>  

<?php 
if (isset($_POST['tambah'])) {
	$cari = mysqli_num_rows(mysqli_query($koneksi,"select * from barang where kd_barang = '$_POST[kd_barang]'"));
	if ($cari > 0) {
		?>
		<script>alert('Kode barang telah terdaftar sebelumnya')</script>
		<?php
	}else{
		$cek = mysqli_query($koneksi,"insert into barang (kd_barang,nm_barang,status,satuan,stok) values('$_POST[kd_barang]','$_POST[nm_barang]','$_POST[status]','$_POST[satuan]','0')");

		if ($cek) {
			?>
			<script>alert('Data barang berhasil di tambahkan!');window.location.href="admin.php?p=db"</script>
			<?php
		}
	}
}
?>