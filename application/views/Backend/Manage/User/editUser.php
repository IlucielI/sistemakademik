				<div class="container-fluid">
					<div class="container w-75 text-dark mt-5">
						<form action="<?= base_url('Akademik/updateUser') ?>" method="POST">
							<input type="hidden" name="id" value="<?= $user['id']; ?>">
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="npm">Npm</label>
									</div>
									<div class="col-md-8">
										<input type="text" readonly class="form-control" id="npm" name="npm" placeholder="npm" required="" value="<?= $mahasiswa['npm'] ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="nama">Nama</label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control" id="nama" name="nama" placeholder="nama" required="" value="<?= $mahasiswa['nama'] ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="kelas">Kelas</label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control" id="kelas" name="kelas" placeholder="kelas" required="" value="<?= $mahasiswa['kelas'] ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="email">Email</label>
									</div>
									<div class="col-md-8">
										<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="" value="<?= $user['email'] ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="semester">Semester</label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control" id="semester" name="semester" placeholder="semester saat ini" required="" value="<?= $mahasiswa['semester'] ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="fakultas">fakultas</label>
									</div>
									<div class="col-md-8">
										<select class="form-control" id="fakultas" name="fakultas_id" required>
											<option value="">Pilih</option>
											<?php foreach ($fakultas as $f) : ?>
												<option value="<?= $f['id'] ?>" <?php if ($f['id'] == $fakultasMhs['id']) echo 'selected' ?>><?= $f['nama'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="jurusan">jurusan</label>
									</div>
									<div class="col-md-8">
										<select class="form-control" id="jurusan" name="jurusan_id" required>
											<?php foreach ($jurusan as $j) : ?>
												<option value="<?= $j['id'] ?>" <?php if ($j['id'] == $mahasiswa['jurusan_id']) echo 'selected' ?>><?= $j['nama'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="username">Username</label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control" id="username" name="username" placeholder="username" required="" value="<?= $user['username'] ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="password">Password</label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control" id="password" name="password" placeholder="password" required="" value="<?= $user['password'] ?>">
									</div>
								</div>
							</div>
							<div class="row d-flex justify-content-center">
								<div class="col-md-4">
									<button type="submit" class="btn btn-warning w-75">Update</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				</div>

				<!-- End of Main Content -->
				<!-- Footer -->
				<footer class="footer bg-white">
					<div class="container">
						<div class="copyright text-center">
							<span>Copyright ?? Your Website 2020</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->

				</div>
				<!-- End of Content Wrapper -->

				</div>
				<!-- End of Page Wrapper -->

				<!-- Bootstrap core JavaScript-->
				<script src="<?= base_url('asset/plugins/sbAdmin2/') ?>vendor/jquery/jquery.min.js"></script>
				<script src="<?= base_url('asset/plugins/sbAdmin2/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

				<!-- Core plugin JavaScript-->
				<script src="<?= base_url('asset/plugins/sbAdmin2/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

				<!-- Custom scripts for all pages-->
				<script src="<?= base_url('asset/plugins/sbAdmin2/') ?>js/sb-admin-2.min.js"></script>


				<script type="text/javascript">
					$(document).ready(function() {
						$('#fakultas').change(function() {
							var id = $(this).val();
							$.ajax({
								url: "<?php echo base_url(); ?>akademik/ajax_jurusan",
								method: "POST",
								data: {
									id: id
								},
								dataType: 'json',
								success: function(data) {
									var html = '';
									var i;
									for (i = 0; i < data.length; i++) {
										html += '<option value="' + data[i].id + '">' + data[i].nama + '</option>';
									}
									$('#jurusan').html(html);
								}
							});
						});
					});
				</script>

				</body>

				</html>
