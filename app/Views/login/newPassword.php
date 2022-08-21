<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
	<style type="text/css">

		body {
		  	background-color: #212529;
		  	background-image: url("<?= base_url() ?>/assets/index/assets/img/map-image.png");
		  	background-repeat: no-repeat;
		  	background-position: center;
		}

		.sign-up {
			border: 2px solid;
			border-color: #9a9a9a;
			background: #fff;
			border-radius: 1px;
			padding: 10px;
			width: 350px;
			margin: 50px auto;
		}

		

	</style>
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 45px;">
			<div class="col-md-4 col-md-offset-4">
				<div class="sign-up">
				<h4>Change Password for <b><?= strtoupper($table['name']);?></b></h4><hr>
				<form action="<?= site_url('auth/updatePassword') ?>" method="POST" autocomplete="off">
					<?= csrf_field() ?>
					<?php if(!empty(session()->getFlashdata('fail'))) : ?>
						<div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
					<?php endif ?>
					<input  type="hidden" name="id" value="<?= $table['id']; ?>">
					<div class="form-group">
						Password: <input  class="form-control" type="password" name="password" placeholder="Enter Password" value="<?= set_value('password'); ?>">
						<span class="text-danger"><?= isset($validation) ? display_error($validation, 'password'):'' ?></span>
					</div>
					<div class="form-group">
						Confirm Password: <input  class="form-control" type="text" name="cpassword" placeholder="Enter Confirm Password" value="<?= set_value('cpassword'); ?>">
						<span class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword'):'' ?></span>
					</div>
					
					<div class="form-group">
						<button type="submit" name="submit" class=" form-control btn btn-primary btn-block">Update</button>
					</div>
				</form>
							 
				<a href="<?= site_url('auth/login') ?>"><u>Back to Login</u></a>
			</div>
		</div>
	</div>
</div>
</body>
</html>