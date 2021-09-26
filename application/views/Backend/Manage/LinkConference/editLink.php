				<div class="container-fluid">
					<div class="container w-75 text-dark mt-5">
						<form action="<?= base_url('Admin/updateLink') ?>" method="POST">
							<input type="hidden" name="link_id" value="<?= $link['link_id']; ?>">
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="link">Link Conference</label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control" id="link" name="link" value="<?= $link['link'] ?>" required>
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

				<script>
					$('.custom-file-input').on('change', function() {
						let fileName = $(this).val().split('\\').pop();
						$(this).next('.custom-file-label').addClass("selected").html(fileName);
					});
				</script>

				</body>

				</html>
