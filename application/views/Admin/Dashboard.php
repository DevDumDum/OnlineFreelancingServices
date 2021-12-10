<!doctype html>
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
                    <li class="nav-item d-flex justify-content-left ">
                        <img class="img-fluid" src="<?php echo base_url();?>public/images/changepassword.png" alt="" width="13%">
                        <a href="Loginpage" class="nav-link-custom">Change Password</a>
                    </li>
                    <li class="nav-item d-flex justify-content-left">
                        <img class="img-fluid" src="<?php echo base_url();?>public/images/logout.png" alt="" width="17%">
                        <a href="Registerpage" class="nav-link-custom">Log Out</a>
                    </li>
                </ul>
            </div>
    </nav>
</header>
<?php 
if($this->session->userdata('UserLoginSession'))
{
    $udata = $this->session->userdata('UserLoginSession');

}
else
{
    redirect(base_url('index.php/AdminLogin'));
}
?>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
  </head>
  <body>
    <?php echo $udata['user_type'];?>
    <br>
    <br>
    <button onclick="window.location.href='ManageUser';">
    Manage User Status
    </button>

    <button onclick="window.location.href='Verifications';">
    Verification
    </button>

    <button onclick="window.location.href='ViewLogs';">
    Logs
    </button>
    <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>