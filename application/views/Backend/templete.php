<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sistem Akademik</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('asset/image/favicon.ico') ?>">

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('asset/plugins/sbAdmin2/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
	<link href="<?= base_url('asset/plugins/sbAdmin2/') ?>css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?= base_url('asset/css/style.css') ?>">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #00adef;">
			<!-- Sidebar - Brand -->
			<div class="d-flex justify-content-center my-3">
				<a class="navbar-brand my-1 p-0 mr-0" href="<?= base_url("Akademik") ?>"><img src="<?= base_url('asset/image/logo.png') ?>"></a>
			</div>
			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item <?php if ($this->uri->segment(2) == null) echo 'active' ?>">
				<a class="nav-link" href="<?= base_url('Akademik') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<li class="nav-item <?php if ($this->uri->segment(2) == 'showUser' or $this->uri->segment(2) == 'editUser' or $this->uri->segment(2) == 'addUser') echo 'active' ?>">
				<a class="nav-link" href="<?= base_url('Akademik/showUser') ?>">
					<i class="fas fa-fw fa-cog"></i>
					<span>Data Mahasiswa</span></a>
			</li>

			<hr class="sidebar-divider">

			<li class="nav-item <?php if ($this->uri->segment(2) == 'showMatakuliah' or $this->uri->segment(2) == 'editMatakuliah' or $this->uri->segment(2) == 'addMatakuliah') echo 'active' ?>">
				<a class="nav-link" href="<?= base_url('Akademik/showMatakuliah') ?>">
					<i class="fas fa-fw fa-cog"></i>
					<span>Data Mata Kuliah</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<div class="d-sm-flex align-items-center justify-content-between mx-auto">
						<h1 class="h3 mb-0 text-gray-800"><?= $title ?>
						</h1>
					</div>


					<!-- Topbar Navbar -->
					<ul class="navbar-nav">
						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="far fa-user-circle fa-2x mr-3"></i>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?= base_url('Akademik/editProfile') ?>">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Edit Profile
								</a>
								<a class="dropdown-item" href="<?= base_url('Auth/signOut') ?>">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Sign Out
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->
