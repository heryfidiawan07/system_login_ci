<?php $this->load->view('template/admin/header') ?>

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Funtion Model Test</h1>
		</div>
		<div class="section-body">
			<h1>ALL</h1>
			<?php foreach ($users as $user): ?>
				<h3><?= $user->name ?></h3>
			<?php endforeach ?>
			<hr>
			<h1>WHERE RESULT</h1>
			<?php foreach ($members as $member): ?>
				<h3><?= $member->name ?></h3>
			<?php endforeach ?>
			<hr>
			<h1>FIND</h1>
			<h3><?= $single->name ?></h3>
			<hr>
			<h1>WHERE ROW</h1>
			<h3><?= $single_data->name ?></h3>
		</div>
	</section>
</div>

<?php $this->load->view('template/footer') ?>