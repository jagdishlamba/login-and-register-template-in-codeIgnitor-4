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
				<h4>Change Password</h4><hr>
				<form action="<?= site_url('auth/checkPassword') ?>" method="POST" autocomplete="off">
					<?= csrf_field() ?>
					<?php if(!empty(session()->getFlashdata('fail'))) : ?>
						<div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
					<?php endif ?>
					<div class="form-group">
						User Name: <input  class="form-control" type="text" name="name" placeholder="Enter User Name" value="<?= set_value('name'); ?>">
						<span class="text-danger"><?= isset($validation) ? display_error($validation, 'name'):'' ?></span>
					</div>
					<div class="form-group">
						Security Question:
						<select class="form-control" name="s_question"> 
							<?php foreach ($table as $key) {
						?>
						    <option class="form-control"value="<?= $key['id'];?>"><?= $key['question'];?></option>
				    	<?php } ?>
						
				    	</select>
					</div>

					<div class="form-group">
						Security Answer: <input  class="form-control" type="text" name="s_answer" placeholder="Enter Answer" value="<?= set_value('s_answer'); ?>">
						<span class="text-danger"><?= isset($validation) ? display_error($validation, 's_answer'):'' ?></span>
					</div>
					
					<div class="form-group">
						<button type="submit" name="submit" class=" form-control btn btn-primary btn-block">Submit</button>
					</div>
				</form>
							 
				<a href="<?= site_url('auth/login') ?>"><u>Back to Login</u></a>
			</div>
		</div>
	</div>
</div>
</body>
</html>