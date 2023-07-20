<?php
session_start();
require("mainconfig.php");
$iduser = $_GET['id'];
if (isset($_SESSION['user'])) {
	$sess_username = $_SESSION['user']['username'];
	$check_user = mysqli_query($db, "SELECT * FROM users WHERE id = '$iduser'");
	$data_user = mysqli_fetch_assoc($check_user);
	if (mysqli_num_rows($check_user) == 0) {
		header("Location: ".$cfg_baseurl."logout.php");
	} else if ($data_user['status'] == "Suspended") {
		header("Location: ".$cfg_baseurl."logout.php");
	}

	include("lib/header.php");
	$msg_type = "nothing";

	if (isset($_POST['change_pswd'])) {
		$iduser = $_GET['id'];
		$post_npassword = trim($_POST['password']);
		$post_password = 1;
		$post_cnpassword = 1;
		if (empty($post_password) || empty($post_npassword) || empty($post_cnpassword)) {
			$msg_type = "error";
			$msg_content = "<b>Gagal:</b> Mohon mengisi semua input.";
		}else if (strlen($post_npassword) < 5) {
			$msg_type = "error";
			$msg_content = "<b>Gagal:</b> Password baru telalu pendek, minimal 5 karakter.";
		} else if ($post_cnpassword <> $post_password) {
			$msg_type = "error";
			$msg_content = "<b>Gagal:</b> Konfirmasi password baru tidak sesuai.";
		} else {
			$update_user = mysqli_query($db, "UPDATE users SET password = '$post_npassword' WHERE id = '$iduser'");
			if ($update_user == TRUE) {
				$msg_type = "success";
				$msg_content = "<b>Success:</b> Password telah diubah.";
			} else {
				$msg_type = "error";
				$msg_content = "<b>Gagal:</b> Error system.";
			}
		}
	} else if (isset($_POST['change_api'])) {
		$set_api_key = random(20);
		$update_user = mysqli_query($db, "UPDATE users SET api_key = '$set_api_key' WHERE id = '$iduser'");
		if ($update_user == TRUE) {
			$msg_type = "success";
			$msg_content = "<b>Berhasil:</b> API Key telah diubah.";
		} else {
			$msg_type = "error";
			$msg_content = "<b>Gagal:</b> Error system.";
		}
	}	
	
	$iduser = $_GET['id'];
	$check_user = mysqli_query($db, "SELECT * FROM users WHERE id = '$iduser' ");
	$data_user = mysqli_fetch_assoc($check_user);
	?>
	<!-- Start content -->
	<div class="content">
		<div class="container-fluid">
			<div class="col-md-12">
				<?php 
				if ($msg_type == "success") {
					?>
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						<i class="fa fa-check-circle"></i>
						<?php echo $msg_content; ?>
					</div>
					<?php
				} else if ($msg_type == "error") {
					?>
					<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						<i class="fa fa-times-circle"></i>
						<?php echo $msg_content; ?>
					</div>
					<?php
				}
				?>
				<div class="card">
					<div class="card-body">
						<h3 class="card-title"><i class="fa fa-gear"></i> Pengaturan</h3>
					</div>
					<div class="card-body">
						<form class="form-horizontal" role="form" method="POST" autocomplete="off">
							<div class="form-group">
								<label class="col-md-3 control-label">Nama</label>
								<div class="col-md-9">
									<input type="text" name="nama" class="form-control" placeholder="<?php echo $data_user['username'] ?>" readonly="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Level</label>
								<div class="col-md-9">
									<input type="text" name="level" class="form-control" placeholder="<?php echo $data_user['level'] ?>" readonly="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Password Baru</label>
								<div class="col-md-9">
									<input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
								</div>
							</div>
							<button type="submit" class="pull-right btn btn-success btn-bordered waves-effect w-md waves-light" name="change_pswd">Ubah Password</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h3 class="card-title"><i class="fa fa-random"></i> API Key</h3>
					</div>
					<div class="card-body">
						<form class="form-horizontal" role="form" method="POST">
							<div class="form-group">
								<label class="col-md-2 control-label">API Key</label>
								<div class="col-md-10">
									<input type="text" class="form-control" value="<?php echo $data_user['api_key']; ?>" readonly>
								</div>
							</div>
							<button type="submit" class="pull-right btn btn-success btn-bordered waves-effect w-md waves-light" name="change_api">Ubah API Key</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- end row -->
		<?php
		include("lib/footer.php");
	} else {
		header("Location: ".$cfg_baseurl);
	}
	?>