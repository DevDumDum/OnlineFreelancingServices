<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<body>
	<div class="container-fluid container_custom">
		<form method="post" autocomplete="off" action="<?=base_url('index.php/Loginpage')?>" style="height:100%;">
			<div class="row align-items-start row_custom">
				<div class="col left-column">
					<h1 class="fw-bolder display-3">WELCOME</h1>
					<img class="img-fluid" src="<?php echo base_url();?>public/images/logo.png" alt="" height="90" class="d-inline-block align-text-top">
					<br><i>Does not have an account? <a href="Registerpage"><u>Sign Up</u></a></i>
				</div>
				<div class="col right-column">
					<div class="mb-3 mb-3_custom">
						<div class="form-text-email-padding">
							<label for="email" class="form-label ">Email</label>
						</div>
						<div class="form-padding">
							<input type="email" placeholder="Email" name="email" class="form-control form-width"
								id="email">
						</div>
					</div>
					<div class="mb-3 mb-3_custom">
						<div class="form-text-password-padding">
							<label for="password" class="form-label">Password</label>
						</div>
						<div class="form-padding">
							<input type="password" name="password" placeholder="Password"
								class="form-control form-width" id="password">
						</div>
					</div>
					<div class="forgot-password-text mb-3">
						<a href="#">Forgot Password or Email?</a>
					</div>
					<div class="text-center text-button">
						<button type="button" class="btn btn-light border border-primary back-custom-color"><a href="Homepage">BACK</a></button>
						<button type="submit" class="btn btn-primary button-custom-color">Login Now</button>
					</div>
					<?php if($this->session->flashdata('error')) {	?>
						<p class="text-danger text-center" style="margin-top: 10px;">
							<?=$this->session->flashdata('error')?>
						</p>
					<?php } ?>
				</div>
			</div>
		</form>
	</div>
</body>
		<?php
			if($this->session->flashdata('error')) {	?>
			<p class="text-danger text-center" style="margin-top: 10px;"> <?=$this->session->flashdata('error')?></p>
		<?php } ?>
						
	</form> -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>
