<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body>
	<p class="h1">User login</p>

	<form method="post" autocomplete="off" action="<?=base_url('Project/OnlineFreelancingServices/loginnow')?>">
					 
		<div class="mb-3">
			<label for="username" class="form-label">Username</label>
				<input type="username"  placeholder="Username" name="username" class="form-control" id="username">
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Password</label>
			<input type="password" name="password"  placeholder="User Password"  class="form-control" id="password">
		 </div>

		<div class="text-center">
			<button type="submit" class="btn btn-primary">Login Now</button>
		</div>

		<?php
			if($this->session->flashdata('error')) {	?>
			<p class="text-danger text-center" style="margin-top: 10px;"> <?=$this->session->flashdata('error')?></p>
		<?php } ?>
						
	</form>
	
</body>
