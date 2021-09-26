<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?= base_url('asset/css/style.css') ?>">

	<title>Sistem Akademik</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('asset/image/favicon.ico') ?>">
</head>

<body>
	<section id="Auth">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="top-logo">
						<img src="<?= base_url('asset/image/logo.png') ?>" alt="" width="90px">
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8 d-flex justify-content-center align-items-center">
					<div class="annotation-login">
						<h1>Gunadarma World Class University</h1>
						<h3>"4th Industrial Revolution."</h3>
					</div>
				</div>
				<div class="col-md-4 form-login">
					<h1>Welcome</h1>
					<form action="<?= base_url('Auth/signIn') ?>" method="POST">
						<div class="form-group">
							<input type="text" class="form-control" id="username" placeholder="Username" name="username" required value="<?php if (isset($_GET["username"])) echo ($_GET["username"]) ?>">
							<img class="icon" src="<?= base_url('asset/image/user.png') ?>">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="password" placeholder="Password" name="password" required value="<?php if (isset($_GET["password"])) echo ($_GET["password"]) ?>">
							<img class="icon" src="<?= base_url('asset/image/locked.png') ?>">
						</div>
						<button type="submit" class="btn btn-primary w-100 my-2">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!-- <section id="footer">
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-5 d-flex mr-3 align-items-center">
						<img src="<?= base_url('asset/image/logo.png') ?>" alt="" width="50" height="auto">
					</div>
					<div class="col-xs-5">
						<span class="text-light">© 2021 All Rights Reserved</span>
					</div>
				</div>
			</div>
		</footer>
	</section> -->

	<div class="mt-2 mr-3 d-none alert alert-dismissible fade show position-absolute" role="alert" style="background-color:#00adef;top:0; right:0;height:fit-content;max-width:50vh; min-width:40vh">
		<h5 class="text-light"></h5>
		<button type="button" class="close ml-2" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


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
