<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/adminloginpage.css"/>
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/adminnavbar.css" />
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<header>
		<nav class="navbar custom-navbar navbar-expand-md navbar-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="Homepage">
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
	
</head>
<body class="adminloginpage">
	<form method="post" autocomplete="off" action="<?=base_url('index.php/AdminLogin')?>" style="height:100%;">
		<div class="container container-custom">
		<h1>Admin Login</h1>
			<div class="mb-3 mb-3_custom">
				<div class="form-text-email-padding">
					<label for="email" class="form-label ">Email:</label>
				</div>
				<div class="form-padding">
					<input type="email" placeholder="Email" name="email" class="form-control form-width" id="email">
				</div>
			</div>
				<div class="mb-3 mb-3_custom">
					<div class="form-text-password-padding">
						<label for="password" class="form-label">Password:</label>
					</div>
					<div class="form-padding">
					<input type="password" name="password" placeholder="Password" class="form-control form-width" id="password">
					</div>
					<br><i>Does not have an account? <a href="AdminRegister"><u>Sign Up</u></a></i>
				</div>
				<div class="text-center text-button">
					<button type="button" class="btn btn-light border border-primary back-custom-color"><a href="Homepage">BACK</a></button>

					<button type="submit" class="btn btn-primary button-custom-color">Login Now</button>
				</div>
		</div>
	</form>
		
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>
