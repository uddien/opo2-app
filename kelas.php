<?php 
	$judul = "MATERI KULIAH";
	include "templates/templates.php";
?>

<div class="container">
  <div class="row">
    <div class="col-10">
			<h2>Master Materi Kuliah</h2>
			<hr>
			<button type="button" class="badge badge-primary p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
				<i class="fas fa-plus"></i> Tambah
			</button>

			<table class="table table-bordered table-hover" id="kelas">
				<thead>
					<tr class="text-center">
						<th>No.</th>
						<th>Pertemuan ke</th>
						<th>Nama Matkul</th>
						<th>Judul</th>
						<th>Deskripsi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no 		= 1;
					$sql 		= "SELECT * FROM kelas a INNER JOIN kompetensi_keahlian b ON a.id_kompetensi=b.id_kompetensi";
					$query 	= mysqli_query($koneksi, $sql);
					while($data = mysqli_fetch_array($query)){
						$id_kelas=$data['id_kelas'];?>
						<tr>
							<td align="center" width="5%"><?= $no++;?>.</td>
							<td><?= $data['kelas'];?></td>
							<td><?= $data['nama_kompetensi_keahlian'];?></td>
							<td><?= $data['judul_materi'];?></td>
							<td><?= $data['deskripsi_materi'];?></td>

							<td align="center" width="25%">
							<?php 
									$sql1="SELECT * FROM detail_siswa WHERE id_kelas = '$id_kelas'";
									$query1=mysqli_query($koneksi, $sql1);
									if(mysqli_num_rows($query1)=='0'){?>
										<a href="kelas-edit.php?id_kelas=<?= $data['id_kelas'];?>" class="badge badge-primary p-2" title="Edit"><i class="fas fa-edit"></i></a> | <a href="kelas-delete.php?id_kelas=<?= $data['id_kelas'];?>" class="badge badge-danger delete-data p-2" title='Delete'><i class="fas fa-trash"></i></a>
										<?php 
									}?>
							</td>
						</tr>
						<?php
					}?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">	
					Input Materi Kuliah
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="kelas-simpan.php" method="post">
					<!-- Kelas -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Petemuan ke - </span>
						<select name="kelas" class="form-control form-control-chosen" required>
							<option value="" selected>~ Pertemuan ~</option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
						</select>
					</div>
					
			
					<!-- Kompetensi Keahlian -->
					<div class="input-group mb-1">
						<span class="input-group-text lebar" >Mata Kuliah</span>
						<select name="id_kompetensi" class="form-control form-control-chosen" required>
							<option value="" selected>~ Pilih Matkul~</option>
							<?php
							$sql = "SELECT * FROM kompetensi_keahlian ORDER BY nama_kompetensi_keahlian";
							$query = mysqli_query($koneksi, $sql);
							while($d = mysqli_fetch_array($query)){?>
								<option value="<?= $d['id_kompetensi'];?>"><?= $d['nama_kompetensi_keahlian']; ?></option>
								<?php
							}?>
						</select>

						<div class="input-group mb-1">
							<span class="input-group-text lebar" >Judul Materi</span>
							<input type="text" name="judul_materi" required autocomplete="off" class="form-control form-control-sm" placeholder="Judul Materi">
						</div>

						<div class="input-group mb-1">
							<span class="input-group-text lebar" >Deskripsi Materi</span>
							<textarea name="deskripsi_materi" class="form-control form-control-sm" cols="30" rows="3" placeholder="Deskripsi" required></textarea>
						</div>
		

					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Simpan</button>
					</div>
					
					
				</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include "templates/footer.php";?>
<script>
	$(document).ready(function() {
		$('#kelas').dataTable();
  });
</script>