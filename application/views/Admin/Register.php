<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url();?>public/css/adminnavbar.css"/>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<header>
    <nav class="navbar custom-navbar navbar-expand-md navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="Homepage">
                <img class="img-fluid" src="<?php echo base_url();?>public/images/logo.png" alt="" width="120" class="d-inline-block align-text-top">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="nav justify-content-end collapse navbar-collapse " id="navbarCollapse">
                    <div class="nav-item d-flex justify-content-left ">
                        <img class="img-fluid" src="<?php echo base_url();?>public/images/changepassword.png" alt="" width="13%">
                        <a href="Loginpage" class="nav-link-custom">Change Password</a>
                    </div>
                    <div class="nav-item d-flex justify-content-left">
                        <img class="img-fluid" src="<?php echo base_url();?>public/images/logout.png" alt="" width="17%">
                        <a href="Registerpage" class="nav-link-custom">Log Out</a>
                    </div>
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
    <h1>Moderator Register</h1>
    <div class = "form-group">
        <label for="companyid" class="label-default">Company ID:</label>
        <input class="form-control" name="companyid" id="companyid" type="text">
    </div>

    <div class = "form-group">
        <label for="" class="label-default">Password:</label>
        <input class="form-control" name="password" id="password" type="password">
    </div>

    <div class = "form-group">
        <label for="" class="label-default">Confirm Password:</label>
        <input class="form-control" name="password2" id="password" type="password">
    </div>

    <div class = "form-group">
        <button class="btn btn-primary" name="register">Register</button>    
    </div>

    <button onclick="window.location.href='Login';">
      Back
    </button>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
