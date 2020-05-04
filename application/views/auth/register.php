<?php $this->load->view('template/admin/header') ?>

<div class="container">
	<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
						</div>
						<form class="user" action="<?= base_url('register/store'); ?>" method="POST" >
							<div class="form-group">
								<input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Name" value="<?= set_value('name'); ?>" autocomplete="off" required>
								<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="text" name="username" class="form-control form-control-user text-lowercase nospace" id="username" placeholder="Username" value="<?= set_value('username'); ?>" autocomplete="off" required>
								<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="email" name="email" class="form-control form-control-user text-lowercase nospace" id="email" placeholder="Email Address" value="<?= set_value('email'); ?>" autocomplete="off" required>
								<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" autocomplete="off" required>
									<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="col-sm-6">
									<input type="password" name="repeat_password" class="form-control form-control-user" id="repeat_password" placeholder="Repeat Password" autocomplete="off" required>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">
								Register Account
							</button>
						</form>
						<hr>
						<div class="text-center">
							<a class="small" href="<?= base_url('forgot_password'); ?>">Forgot Password?</a>
						</div>
						<div class="text-center">
							<a class="small" href="<?= base_url('login'); ?>">Already have an account? Login!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('template/footer') ?>