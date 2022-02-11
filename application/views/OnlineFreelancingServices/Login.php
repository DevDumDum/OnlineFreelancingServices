<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<body class = "loginBody">
	<div class="container-fluid containerLogin">
		<form method="post" autocomplete="off" action="<?=base_url('Loginpage')?>" style="height:100%;">
			<div class="row login-row_custom align-items-start">
				<div class="col-md-6 loginLeftSide">
					<h1 class= "loginH1">WELCOME</h1>
					<img class="img-fluid" src="<?php echo base_url();?>public/images/logo.png" alt="" class="d-inline-block align-text-top">
					<br><br><i class = "loginDonothave">Do not have an account yet? <a href="Registerpage" class="registerLink"><u>Sign Up</u></a></i>
				</div>
				<div class="col right-column">
					<div id="loginInsertFormID">
						<div class="mb-3 mb-3_custom">
							<div class="form-text-email-padding">
								<labuel for="email" class="loginFormEmail form-label">Email</label>
							</div>
							<div class="form-padding">
								<input type="email" placeholder="Email" name="email" class="loginInsertForm form-control"
									id="email">
							</div>
						</div>
						<div class="mb-3 mb-3_custom">
							<div class="form-text-password-padding">
								<label for="password" class="loginFormPassword form-label">Password</label>
							</div>
							<div class="form-padding">
								<input type="password" name="password" placeholder="Password"
									class="loginInsertForm form-control" id="password">
							</div>
						</div>
					</div>

					<div>
						<a href="ForgotPassword" class="loginforgotPass">Forgot Password or Email?</a> 
					</div> 
					<br>
					<br>
					<div class="text-center text-button">
						<button type="button" class="btn btn-light border border-primary back-custom-color btn-lg"><a href="Homepage" id ="loginBack">BACK</a></button>
						<button type="submit" class="btn button-custom-color btn-lg" id ="login-now">LOG IN</button>
					</div>
					<?php if($this->session->flashdata('error')) {	?>
						<p class="text-danger text-center">
							<?=$this->session->flashdata('error')?>
						</p>
					<?php } ?>
				</div>
			</div>
		</form>
	</div>
	
</body>
</body>
<?php if($this->session->flashdata('error')) {	?>
	<script>
		<p class="text-danger text-center"> <?=$this->session->flashdata('error')?></p>
	</script>
<?php } ?>