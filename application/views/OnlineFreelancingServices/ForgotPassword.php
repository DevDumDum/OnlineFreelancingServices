<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<body class = "loginBody">
	<div class="container-fluid containerLogin">
		<form method="post" autocomplete="off" action="<?=base_url('ForgotPassword')?>" style="height:100%;">
			<div class="row login-row_custom align-items-start">
				<div class="col right-column">
					<div id="loginInsertFormID">
						<div class="mb-3 mb-3_custom">
							<div class="form-text-email-padding">
								<label for="email" class="loginFormEmail form-label">Email</label>
							</div>
							<div class="form-padding">
								<input type="email" placeholder="Email" name="email" class="loginInsertForm form-control"
									id="email">
							</div>
						</div>
					</div>

					<div class="text-center text-button">
						<button type="button" class="btn btn-light border border-primary back-custom-color btn-lg"><a href="LoginPage" id ="loginBack">BACK</a></button>
						<button type="submit" class="btn button-custom-color btn-lg" id ="login-now">Send</button>
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
		<?php
			if($this->session->flashdata('error')) {	?>
			<p class="text-danger text-center"> <?=$this->session->flashdata('error')?></p>
		<?php } ?>
						
	</form> -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>