<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/register.css"/>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Franco Part</title>

<body>
	<p class="h1">User login</p>

	<form action="login.php" method="get">
		<div class="form-group">
			<label for="email" class="">Email address</label>
			<input type="email" class="form-control" placeholder="Enter email">

			<br>

			<label for="password">Password</label>
			<input type="password" name="password" placeholder="Password">

			<br>
			
			<input onclick="" type="button" value="Login">
		</div>
	</form>
	
</body>
</html>