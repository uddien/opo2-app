<?php
$judul = "Edit Kompetensi Keahlian";
include "templates/templates.php";

$id_kompetensi = $_GET['id_kompetensi'];
$sql = "SELECT * FROM kompetensi_keahlian WHERE id_kompetensi='$id_kompetensi'";
$query= mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);?>

<div class="container">
  <div class="row">
    <div class="col-6">
			<h2>Edit Mata Kuliah</h2>
			<form action="kompetensi-keahlian-update.php" method="post">
				<input type="hidden" name="id_kompetensi" value="<?= $id_kompetensi;?>">

				<input name="nama_kompetensi_keahlian_lama" value="<?= $data['nama_kompetensi_keahlian'];?>" type="hidden">
				<input name="deskripsi_matkul_lama" value="<?= $data['deskripsi_matkul'];?>" type="hidden">
				

				<!-- Nama Kompetensi Keahlian Baru-->
				<div class="input-group mb-1">
					<span class="input-group-text lebar" >Nama Matkul</span>
					<input name="nama_kompetensi_keahlian_baru" value="<?= $data['nama_kompetensi_keahlian'];?>" class="form-control form-control-sm" required>
				</div>

				<div class="input-group mb-1">
					<span class="input-group-text lebar" >Deskripsi matkul</span>
					<input name="deskripsi_matkul_baru" value="<?= $data['deskripsi_matkul'];?>" class="form-control form-control-sm" required>
				</div>


				<div class="modal-footer">
					<button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Update</button> | <a href="kompetensi-keahlian.php" class="btn btn-sm btn-warning"><i class="fas fa-redo"></i> Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include "templates/footer.php";?>
