<?php $this->load->view('template/admin/header') ?>

<div class="container">
	<!-- Outer Row -->
	<div class="row justify-content-center">
		<div class="col-xl-7">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>
								</div>

								<?= $this->session->flashdata('message'); ?>

								<form class="user" method="POST" action="<?= base_url('forgot_password/store'); ?>">
									<div class="form-group">
										<input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
										<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
									</div>
									<button type="submit" class="btn btn-primary btn-user btn-block">
									Send Mail
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('template/footer') ?>