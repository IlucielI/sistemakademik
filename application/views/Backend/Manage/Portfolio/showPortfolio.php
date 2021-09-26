				<div class="container-fluid">
					<table class="table table-hover table-dark text-center w-100" id="table_id">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Page</th>
								<th scope="col">Video</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($portfolio as $port) : ?>
								<tr>
									<td scope="row"><?= $i++ ?></td>
									<td><?= $port["portfolio_page"]; ?></td>
									<td><video width="320px" height="auto" controls style="pointer-events: auto;">
											<source src="<?= base_url('asset/video/' . $port['portfolio_file'])  ?>" type="video/mp4">
										</video></td>
									<td>
										<form action="<?= base_url('Admin/editPortfolio') ?>" method="POST">
											<input type="hidden" name="portfolio_id" value="<?= $port['portfolio_id']; ?>">
											<button type="submit" class="btn btn-warning">Update</button>
										</form>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<!-- Button trigger modal -->

					<!-- Modal -->

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
				<div class="mt-2 mr-3 d-none alert alert-dismissible fade show position-absolute" role="alert" style="background-color:#00adef;top:0; right:0;height:fit-content;max-width:50vh; min-width:40vh">
					<h5 class="text-light"></h5>
					<button type="button" class="close ml-2" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<!-- Bootstrap core JavaScript-->
				<script src="<?= base_url('asset/plugins/sbAdmin2/') ?>vendor/jquery/jquery.min.js"></script>
				<script src="<?= base_url('asset/plugins/sbAdmin2/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

				<!-- Core plugin JavaScript-->
				<script src="<?= base_url('asset/plugins/sbAdmin2/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

				<!-- Custom scripts for all pages-->
				<script src="<?= base_url('asset/plugins/sbAdmin2/') ?>js/sb-admin-2.min.js"></script>

				<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
				<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
				<script>
					$(document).ready(function() {
						$('#table_id').DataTable({
							scrollX: true,
							scrollCollapse: true,
							autoWidth: true
						});
					});
				</script>
				<?php if ($this->session->flashdata('flash')) : ?>
					<script>
						$('.alert h5').text('<?= $this->session->flashdata('flash') ?>');
						$('.alert').removeClass('d-none');
						setTimeout(function() {
							$('.alert').addClass('d-none');
						}, 4500);
					</script>
				<?php endif; ?>
				</body>

				</html>
