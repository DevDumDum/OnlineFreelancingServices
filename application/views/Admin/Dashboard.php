<!doctype html>
<?php 
if($this->session->userdata('UserLoginSession'))
{
    $udata = $this->session->userdata('UserLoginSession');

}
else
{
    redirect(base_url('AdminAuth/AdminLogin'));
}
?>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../public/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/adminnavbar.css"/>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>
  </head>

  <!-- Admin Navbar (temporary) -->
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
                        <a href="AdminLogout" class="nav-link-custom">Log Out</a>
                    </li>
                </ul>
            </div>
    </nav>

  <body>
    <?php echo $udata['user_type'];?>

    <div class="AdminLP">
        <img src="<?php echo base_url();?>public/images/logo.png" width="100%">
  
      <ul class="menu">
        <li><button onclick="window.location.href='ManageUser';">
        Manage User Status
        </button></li>

        <li><button onclick="window.location.href='Verifications';">
        Verification
        </button></li>

        <li><button onclick="window.location.href='ViewLogs';">
        Logs
        </button></li>
      </ul>
    </div>

  </body>
</html>