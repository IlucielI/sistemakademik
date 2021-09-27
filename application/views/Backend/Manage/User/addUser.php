				<div class="container-fluid">
					<div class="container w-75 text-dark mt-5">
						<form action="<?= base_url('Akademik/insertUser') ?>" method="POST">
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="nama">Nama</label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control" id="nama" name="nama" placeholder="nama" required="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="kelas">Kelas</label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control" id="kelas" name="kelas" placeholder="kelas" required="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="email">Email</label>
									</div>
									<div class="col-md-8">
										<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="semester">Semester</label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control" id="semester" name="semester" placeholder="semester saat ini" required="">
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
												<option value="<?= $f['id'] ?>"><?= $f['nama'] ?></option>
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
											<option value="">Pilih</option>
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
										<input type="text" class="form-control" id="username" name="username" placeholder="username" required="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="password">Password</label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control" id="password" name="password" placeholder="password" required="">
									</div>
								</div>
							</div>
							<div class="row d-flex justify-content-center">
								<div class="col-md-4">
									<button type="submit" class="btn btn-warning w-75">Tambah</button>
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
							<span>Copyright © Your Website 2020</span>
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
