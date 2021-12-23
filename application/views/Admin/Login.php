<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<header>
	<nav class="navbar custom-navbar navbar-expand-md navbar-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="AdminLogin">
				<img class="img-fluid" src="<?php echo base_url();?>public/images/logo.png" alt="" width="120"
					class="d-inline-block align-text-top">
			</a>
			<ul class="nav justify-content-end">
				<li class="nav-item">
					<img class="img-fluid" src="<?php echo base_url();?>public/images/help.png" alt="" width="50">
				</li>
			</ul>
		</div>
	</nav>
</header>
<body class="adminloginpage">
	<form method="post" autocomplete="off" action="<?=base_url('AdminAuth/AdminLogin')?>" style="height:100%;">
		<div class="container container-custom">
		<h1 class = "admin-login-h1">Admin Login</h1>
		<br>
			<div class="mb-3 mb-3_custom">
				<div class="form-text-email-padding">
					<label for="CompanyID" class="form-label">Company ID:</label>
				</div>
				<div class="form-padding">
					<input type="text" placeholder="CompanyID" name="email" class="form-control form-width" id="email" required>
				</div>
			</div>
				<div class="mb-3 mb-3_custom">
					<div class="form-text-password-padding">
						<label for="password" class="form-label">Password:</label>
					</div>
					<div class="form-padding">
					<input type="password" name="password" placeholder="Password" class="form-control form-width" id="password" required>
					</div>
					<br><i>Does not have an account? <a href="AdminRegister" class = "admin-signup"><u>Sign Up</u></a></i>
				</div>
				<div class="text-center text-button">
					<button type="submit" class="btn btn-primary button-custom-color">Login Now</button>
				</div>

				<?php if($this->session->flashdata('error')) {    ?>
					<p class="text-danger text-center" style="margin-top: 10px;">
						<?=$this->session->flashdata('error')?>
					</p>
				<?php } ?>
		</div>
	</form>
		
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>
