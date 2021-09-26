				<div class="container-fluid">
					<div class="row">
						<div class="col">
							<a href="<?= base_url('Admin/addUser') ?>">
								<button type="button" class="btn btn-primary my-3">Tambah Mahasiswa</button>
							</a>
						</div>
						<div class="col d-flex justify-content-end">
							<button type="button" class="btn btn-info my-3" data-toggle="modal" data-target="#ActiveorEmailAllBackdrop">Active or Email All</button>
						</div>
					</div>
					<table class="table table-hover table-dark text-center" id="table_id">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Username</th>
								<th scope="col">Password</th>
								<th scope="col">Email</th>
								<th scope="col">Role</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($user as $user) : ?>
								<tr>
									<td scope="row"><?= $i++ ?></td>
									<td><?= $user["username"]; ?></td>
									<td><?= $user["password"]; ?></td>
									<td><?= $user["email"]; ?></td>
									<td><?= $user["role"]; ?></td>
									<td>
										<form action="<?= base_url('Admin/editUser') ?>" method="POST" style="display: inline;">
											<input type="hidden" name="id" value="<?= $user['id']; ?>">
											<button type="submit" class="btn btn-warning d-inline">Edit</button>
										</form>
										<button type="button" class="btn btn-danger btn-delete d-inline" data-toggle="modal" data-target="#deleteBackdrop" data-id="<?= $user['id']; ?>" data-username="<?= $user["username"]; ?>">Delete</button>
										<button type="button" class="btn btn-primary btn-resend mt-1" data-toggle="modal" data-target="#emailBackdrop" data-id="<?= $user['id']; ?>">Email</button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<!-- Button trigger modal -->

					<!-- Modal -->
					<div class="modal fade" id="deleteBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title text-danger" id="deleteBackdropLabel">Delete User</h5>
								</div>
								<div class="modal-body text-center">
									<h4 class="text-warning">Are You Sure ?</h4>
									<h6 class="text-danger">Delete User</h6>
									<h2 class="text-primary" id="usernameDelete"></h2>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
									<form action="<?= base_url('Admin/deleteUser') ?>" method="POST">
										<input type="hidden" name="id" id="id">
										<button type="submit" class="btn btn-danger">Delete</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="emailBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="emailBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title text-primary" id="emailBackdropLabel">Resend</h5>
								</div>
								<div class="modal-body">
									<h4 class="text-center text-info">Resend Email ?</h4>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
									<form action="<?= base_url('Admin/resendEmail') ?>" method="POST">
										<input type="hidden" name="id" id="id">
										<button type="submit" class="btn btn-primary">Resend</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="ActiveorEmailAllBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ActiveorEmailAllBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title text-primary" id="ActiveorEmailAllBackdropLabel">Active or Email All</h5>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col d-flex justify-content-center">
											<form action="<?= base_url('Admin/is_active') ?>" method="POST">
												<input type="hidden" name="is_active" id="is_active" value="1">
												<button type="submit" class="btn btn-warning">Active All</button>
											</form>
										</div>
										<div class="col d-flex justify-content-center">
											<form action="<?= base_url('Admin/is_active') ?>" method="POST">
												<input type="hidden" name="is_active" id="is_active" value="0">
												<button type="submit" class="btn btn-danger">Non Active All</button>
											</form>
										</div>
										<div class="col d-flex justify-content-center">
											<form action="<?= base_url('Admin/resendEmailAll') ?>" method="POST">
												<input type="hidden" name="emailAll" id="emailAll" value="true">
												<button type="submit" class="btn btn-primary">Email All</button>
											</form>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
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
							autoWidth: true,
							paging: true,
							columnDefs: [{
								"width": "150px",
								"targets": [7]
							}]
						});
						$(".btn-delete").click(function() {
							$("#deleteBackdrop #id").attr('value', $(this).data('id'));
							$("#usernameDelete").html($(this).data('username'))
						});
						$(".btn-resend").click(function() {
							$("#emailBackdrop #id").attr('value', $(this).data('id'));
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
