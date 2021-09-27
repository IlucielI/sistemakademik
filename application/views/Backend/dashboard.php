				<div class="container-fluid">
					<!-- Content Row -->
					<div class="row">
						<?php if ($this->session->userdata('role') == "admin") : ?>
							<h5>Selamat Datang, <?= $this->session->userdata('username') ?></h5>
						<?php endif; ?>
						<?php if ($this->session->userdata('role') == "mahasiswa") : ?>
							<h5>Selamat Datang, <?= $this->session->userdata('nama') ?></h5>
						<?php endif; ?>
					</div>
					<?php if ($this->session->userdata('role') == "admin") : ?>
						<div class="row">
							<!-- Employee Card Example -->
							<div class="col">
								<div class="card border-left-success shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Mahasiswa</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countMahasiswa ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-user-friends fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<!-- Employee Card Example -->
							<div class="col">
								<div class="card border-left-success shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Mata Kuliah</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countMahasiswa ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-user-friends fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if ($this->session->userdata('role') == "mahasiswa") : ?>
						<div class="row">
							<!-- Employee Card Example -->
							<div class="col">
								<div class="card border-left-success shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total SKS Diambil</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countSKS ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-user-friends fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<!-- Employee Card Example -->
							<div class="col">
								<div class="card border-left-success shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Semester</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countSKS ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-user-friends fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
				</div>

				<!-- End of Main Content -->
				<!-- Footer -->
				<footer class="footer bg-white">
					<div class="container">
						<div class="copyright text-center">
							<span>© 2021 All Rights Reserved</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->

				</div>
				<!-- End of Content Wrapper -->

				</div>
				<!-- End of Page Wrapper -->

				<!-- Scroll to Top Button-->
				<a class="scroll-to-top rounded" href="#page-top">
					<i class="fas fa-angle-up"></i>
				</a>

				<!-- Bootstrap core JavaScript-->
				<script src="<?= base_url('asset/plugins/sbAdmin2/') ?>vendor/jquery/jquery.min.js"></script>
				<script src="<?= base_url('asset/plugins/sbAdmin2/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

				<!-- Core plugin JavaScript-->
				<script src="<?= base_url('asset/plugins/sbAdmin2/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

				<!-- Custom scripts for all pages-->
				<script src="<?= base_url('asset/plugins/sbAdmin2/') ?>js/sb-admin-2.min.js"></script>

				</body>

				</html>
