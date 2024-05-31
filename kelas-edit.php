<?php
	$judul = "Edit Master Kelas";
	include "templates/templates.php";

	$id_kelas = $_GET['id_kelas'];
	$sql = "SELECT * FROM kelas a INNER JOIN kompetensi_keahlian b ON a.id_kompetensi=b.id_kompetensi WHERE a.id_kelas='$id_kelas'";
	$query= mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_array($query);
	$kelas=$data['kelas'];
	$id_kompetensi=$data['id_kompetensi'];
?>

<div class="container">
  <div class="row">
    <div class="col-6">
			<h2>Edit Materi Kuliah</h2>
			<form action="kelas-update.php" method="post">
				<input type="hidden" name="id_kelas" value="<?= $id_kelas;?>">

				<!-- Kelas -->
				<div class="input-group mb-2">
					<span class="input-group-text lebar" >Pertemuan ke -</span>
					<select name="kelas" required class="form-control form-control-chosen">
						<option value="01" <?php if($kelas=='01'){echo 'selected="selected"';}?>>01</option>
						<option value="02" <?php if($kelas=='02'){echo 'selected="selected"';}?>>02</option>
						<option value="03" <?php if($kelas=='03'){echo 'selected="selected"';}?>>03</option>
						<option value="04" <?php if($kelas=='04'){echo 'selected="selected"';}?>>04</option>
						<option value="05" <?php if($kelas=='05'){echo 'selected="selected"';}?>>05</option>
						<option value="06" <?php if($kelas=='06'){echo 'selected="selected"';}?>>06</option>
						<option value="07" <?php if($kelas=='07'){echo 'selected="selected"';}?>>07</option>
						<option value="08" <?php if($kelas=='08'){echo 'selected="selected"';}?>>08</option>
						<option value="09" <?php if($kelas=='09'){echo 'selected="selected"';}?>>09</option>
						<option value="10" <?php if($kelas=='10'){echo 'selected="selected"';}?>>10</option>
						<option value="11" <?php if($kelas=='11'){echo 'selected="selected"';}?>>11</option>
						<option value="12" <?php if($kelas=='12'){echo 'selected="selected"';}?>>12</option>
						<option value="13" <?php if($kelas=='13'){echo 'selected="selected"';}?>>13</option>
						<option value="14" <?php if($kelas=='14'){echo 'selected="selected"';}?>>14</option>
					</select>
				</div>

					<!-- Nama Komtensi Keahlian -->
					<div class="input-group mb-1">
					<span class="input-group-text lebar" >Matkul</span>
					<select name="id_kompetensi" class="form-control form-control-chosen" required>
						<?php
						$sql = "SELECT * FROM kompetensi_keahlian ORDER BY nama_kompetensi_keahlian";
						$query = mysqli_query($koneksi, $sql);
						while($d = mysqli_fetch_array($query)){
							$id=$d['id_kompetensi'];?>
							<option value="<?= $id; ?>" <?php if($id==$id_kompetensi){echo 'selected="selected"';}?>><?= $d['nama_kompetensi_keahlian']; ?></option>
							<?php
						}?>
					</select>
				</div>

				<!-- judul materi-->
				<div class="input-group mb-1 input-sm">
					<span class="input-group-text lebar" >Judul materi</span>
					<input type="text" name="judul_materi" class="form-control form-control-sm"  value="<?= $data['judul_materi'];?>" required>
				</div>

				<div class="input-group mb-1">
					<span class="input-group-text lebar" >Deskripsi materi</span>
					<input name="deskripsi_materi" value="<?= $data['deskripsi_materi'];?>" class="form-control form-control-sm" required>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Update</button> | <a href="kelas.php" class="btn btn-sm btn-warning"><i class="fas fa-redo"></i> Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include "templates/footer.php";?>
