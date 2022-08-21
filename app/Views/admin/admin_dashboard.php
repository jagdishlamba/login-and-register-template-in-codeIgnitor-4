<?= $this->extend('admin/base') ?>

<?= $this->section('title') ?>
	<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('logo') ?>
	Welcome <?= strtoupper($user['name']); ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="container">
		<div class="row">
			<h2>Total Order Received</h2>
			<table class="table table-striped table-hover" border="1">
				<tbody>
					<td>Name</td>
					<td>Email</td>
					<td>Phone</td>
					<td>Message</td>
				</tbody>
				<tr>
					<?php
					foreach ($contact as $k) { ?>
						<td><?= $k['name']?></td>
						<td><?= $k['email']?></td>
						<td><?= $k['phone']?></td>
						<td><?= $k['message']?></td>
					</tr>
					<?php } ?>
			</table>
		</div>
	</div>
<?= $this->endSection() ?>
	
