				<div class="container-fluid">
					<div class="container w-75 text-dark mt-5">
						<form action="<?= base_url('Admin/updateUser') ?>" method="POST">
							<input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="username">Username</label>
									</div>
									<div class="col-md-8">
										<input type="text" readonly class="form-control" id="username" name="username" value="<?= $user['username'] ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="password">Password</label>
									</div>
									<div class="col-md-8">
										<input type="password" class="form-control" id="password" name="password" placeholder="password" required value="<?= $user['password'] ?>">
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
										<label for="role">Role</label>
									</div>
									<div class="col-md-8">
										<select class="form-control" id="role" name="role_id" required>
											<option <?php if ($user['role_id'] == 1) echo 'selected' ?> value="1">Admin</option>
											<option <?php if ($user['role_id'] == 2) echo 'selected' ?> value="2">Employee</option>
											<option <?php if ($user['role_id'] == 3) echo 'selected' ?> value="3">Internship</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="is_active">Is_Active</label>
									</div>
									<div class="col-md-8">
										<select class="form-control" id="is_active" name="is_active" required>
											<option <?php if ($user['is_active'] == 0) echo 'selected' ?> value="0">Not Active</option>
											<option <?php if ($user['is_active'] == 1) echo 'selected' ?> value="1">Is Active</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row d-flex justify-content-center">
								<div class="col-md-4">
									<button type="submit" class="btn btn-warning w-75">Edit</button>
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

				</body>

				</html>
