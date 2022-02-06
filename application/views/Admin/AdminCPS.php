<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body class="adminloginpageBody">

	<form method="post" autocomplete="off" action="<?=base_url('AdminAuth/AdminLogin')?>" style="height:100%;">

	<div class="row modregister-row_custom">
        <div class="col-md-6 no-gutters modloginLeftSide">
		<div class="logincontainer container-custom">
		<div class="justify-content-center align-items-center">
            <img class="img-fluid" src="<?php echo base_url();?>public/images/logo.png" 
        	class ="modlogo mx-auto d-block" alt="" height="70">
		</div>
		</div>
	</div>

		<div class="col-md-6 no-gutters modadminRightSide">
			<h1 class = "admin-login-h1">Change Password</h1>
				<div id="loginInsertFormID">
						<div class="mb-3 mb-3_custom">
							<div class="form-text-email-padding">
                                <div class = "registerTextCont">
                                    <label for="password" class="customlabel" ><span>New Password</span></label><br>
                                    <input name="password" id="pw1" onfocusout="confirm_pass()" class="form-control form-width" type="password" class="ps" required>
                                </div>
							</div>
						</div>

						<div class="mb-3 mb-3_custom">
							<div class="form-text-email-padding">
                                <div class = "registerTextCont">
                                    <label for="password" class="customlabel" ><span>Confirm Password</span></label><br>
                                    <input name="confirm-pw" id="pw2" onfocusout="confirm_pass()" class="form-control form-width" type="password" class="Cps" required>
                                </div>
							</div>
						</div>
				</div>
				<div class="text-center text-button">
						<button type="submit" class="btn button-custom-color btn-lg" id ="login-now">Change Password</button>
					</div>

				<?php if($this->session->flashdata('error')) {    ?>
					<p class="text-danger text-center" style="margin-top: 10px;">
						<?=$this->session->flashdata('error')?>
					</p>
				<?php } ?>
		</div>
		</div>
	</form>
		
</body>
<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>


