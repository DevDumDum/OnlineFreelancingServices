<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url();?>public/css/moderatorRegisterpage.css"/>
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

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Moderator Register</title>
</head>
<body>
  <h1 class="text-center">Moderator Register</h1>
  <div class="container">
      <div class="mb-3 mb-3_custom">
						<div class="form-text-company-id-padding">
							<label for="companyid" class="form-label ">Company ID:</label>
						</div>
						<div class="form-padding">
							<input type="form-control" name="companyid" class="form-control form-width" id="companyid" type="text">
						</div>
		  </div>
		  <div class="mb-3 mb-3_custom">
						<div class="form-text-password-padding">
							<label for="" class="form-label">Password</label>
						</div>
						<div class="form-padding">
							<input type="password" name="password" class="form-control form-width" id="password">
						</div>
		  </div>
      <div class="mb-3 mb-3_custom">
						<div class="form-text-password-padding">
							<label for="" class="form-label">Confirm Password:</label>
						</div>
						<div class="form-padding">
							<input type="password" name="password2" class="form-control form-width" id="password">
						</div>
		  </div>
			    <div class="text-center text-button">
            <button type="button" class="btn btn-light border border-primary back-custom-color"><a href="Homepage">BACK</a></button>
            <button type="submit" class="btn btn-primary button-custom-color">Register</button>
		      </div>
  </div>
</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
