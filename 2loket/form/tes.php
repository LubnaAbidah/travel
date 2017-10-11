<?php
include("../isi/koneksi/koneksi.php");
?>
<div class="container">
		<div class="content">
			<h2>Manajemen User &raquo; Data User</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$nim = $_GET['nim'];
				$cek = mysqli_query($koneksi, "SELECT * FROM pesan WHERE nim='$id_pesan'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info">Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM pesan WHERE nim='$id_pesan'");
					if($delete){
						echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-info">Data gagal dihapus.</div>';
					}
				}
			}
			?>
			
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="urut" class="form-control" onchange="form.submit()">
						<option value="0">Filter</option>
						<?php $urut = (isset($_GET['urut']) ? strtolower($_GET['urut']) : NULL);  ?>
						<option value="1" <?php if($urut == '1'){ echo 'selected'; } ?>>Lunas</option>
						<option value="2" <?php if($urut == '2'){ echo 'selected'; } ?>>Belum Bayar</option>
					</select>
				</div>
			</form>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
					 <td>No</td>
                      <td>ID Pemesanan</td>
                      <td>Nama Pemesan</td>
                      <td>Telepon</td>
                      <td>Tanggal Pemesanan</td>
                      <td>ID Jadwal</td>
                      <td>qty</td>
                      <td>Status</td>
                      <td>ID Member</td>
                      <td>Total</td>
				</tr>
				<?php
				if($urut){
					$sql = mysqli_query($kdb, "SELECT * FROM pesan WHERE status='$urut' ORDER BY nim ASC");
				}else{
					$sql = mysqli_query($kdb, "SELECT * FROM pesan ORDER BY nim ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Tidak ada data.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['id_pesa'].'</td>
							<td>'.$row['nama_penumpang'].'</td>
							<td>'.$row['telp'].'</td>
							<td>'.$row['id_jadwal'].'</td>
							<td>'.$row['qty'].'</td>
							<td>'.$row['status'].'</td>
							<td>'.$row['tgl_pesan'].'</td>
							<td>'.$row['id_member'].'</td>
							<td>'.$row['total'].'</td>
							<td>';
							if($row['status'] == 1){
								echo '<span class="label label-success">Lunas</span>';
							}else{
								echo '<span class="label label-warning">Belum bayar</span>';
							}
						echo '
							</td>
							<td>
								<a href="profile.php?nim='.$row['nim'].'" title="Lihat Detail"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
								<a href="edit.php?nim='.$row['nim'].'" title="Rubah Data"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="password.php?nim='.$row['nim'].'" title="Ganti Password"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></a>
								<a href="avatar.php?nim='.$row['nim'].'" title="Ganti Password"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span></a>
								<a href="index.php?aksi=delete&nim='.$row['nim'].'" title="Hapus Data" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div>