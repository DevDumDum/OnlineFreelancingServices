<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<body class = "loginBody">
	<div class="container-fluid containerLogin">
		<form method="post" autocomplete="off" action="<?=base_url('NewPassword')?>" style="height:100%;">
			<div class="row login-row_custom align-items-start">
				<div class="col right-column">
					<div id="loginInsertFormID">
						<div class="mb-3 mb-3_custom">
                                <div class = "registerTextCont">
                                    <label for="password" class="customlabel" ><span>New Password</span></label><br>
                                    <input name="password" id="pw1" onfocusout="confirm_pass()" type="password" class="ps" required>
                                </div>

                                <div class = "registerTextCont">
                                    <label for="password" class="customlabel" ><span>Confirm Password</span></label><br>
                                    <input name="confirm-pw" id="pw2" onfocusout="confirm_pass()" type="password" class="Cps" required>
                                </div>
						</div>
					</div>

					<div class="text-center text-button">
						<button type="submit" class="btn button-custom-color btn-lg" id ="login-now">Change Password</button>
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
