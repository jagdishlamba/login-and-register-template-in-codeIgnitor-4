<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
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
			border-radius: 4px;
			padding: 10px;
			width: 350px;
			margin: 50px auto;
		}

	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="sign-up">
				<h4>Register Here</h4><hr>
				<form action="<?= site_url('auth/save') ?>" method="POST" autocomplete="off">
					<?= csrf_field(); ?>
					<?php if(!empty(session()->getFlashdata('fail'))) : ?>
						<div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
					<?php endif ?>
					<?php if(!empty(session()->getFlashdata('success'))) : ?>
						<div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
					<?php endif ?>
					<div class="form-group">
						User Name: <input  class="form-control" type="text" name="name" placeholder="Enter User Name" value="<?= set_value('name'); ?>">
						<span class="text-danger"><?= isset($validation) ? display_error($validation, 'name'):'' ?></span>
					</div>

					<div class="form-group">
						Password: <input  class="form-control" type="password" name="password" placeholder="Enter Password" value="<?= set_value('password'); ?>">
						<span class="text-danger"><?= isset($validation) ? display_error($validation, 'password'):'' ?></span>
					</div>
					<div class="form-group">
						Confirm Password: <input  class="form-control" type="text" name="cpassword" placeholder="Enter Confirm Password" value="<?= set_value('cpassword'); ?>">
						<span class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword'):'' ?></span>
					</div>
					<div class="form-group">
						User Type:
						<select class="form-control" name="priority"> 
							<?php foreach ($usertype as $key) {
						?>
						    <option class="form-control"value="<?= $key['id'];?>"><?= $key['user_type'];?></option>
				    	<?php } ?>
				    	</select>
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
						<button type="submit" name="submit" class=" form-control btn btn-primary btn-block">Register</button>
					</div>
					</form>
					Already have an account.<a href="<?= site_url('auth/login') ?>">Login Here</a><br><br>
					<a href="<?= site_url('Home/index') ?>"><u>Back to Home Page</u></a>
			
		</div>
			</div>
		</div>
	</div>

</body>
</html>