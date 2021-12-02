<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body>
	<p class="h1">User login</p>
	<a href="Homepage">< BACK </a>
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