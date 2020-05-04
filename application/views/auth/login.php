<?php $this->load->view('template/admin/header') ?>

<div class="container">
	<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Login</h1>
						</div>
						<?= $this->session->flashdata('message'); ?>
						<form method="POST" action="<?= base_url('login/store'); ?>" class="needs-validation" novalidate="">
							<div class="form-group">
								<label for="email">Email</label>
								<input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
								<div class="invalid-feedback">
									<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group">
								<div class="d-block">
									<label for="password" class="control-label">Password</label>
									<div class="float-right">
										<a href="<?= base_url('forgot_password'); ?>" class="text-small">
											Forgot Password?
										</a>
									</div>
								</div>
								<input id="password" type="password" class="form-control" name="password" tabindex="2" required>
								<div class="invalid-feedback">
									<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
									<label class="custom-control-label" for="remember-me">Remember Me</label>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Login</button>
							</div>
						</form>
						<div class="text-muted text-center">
							Don't have an account? <a href="<?= base_url('register'); ?>">Register</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('template/footer') ?>