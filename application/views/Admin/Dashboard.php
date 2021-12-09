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
    <title>Dashboard</title>
  </head>
  <body>
    <?php echo $udata['user_type'];?>
    <br>
    <br>
    <button onclick="window.location.href='';">
    Change Password
    </button>

    <button type="button" class="btn btn-primary button-custom-color"><a href="AdminLogout">Logout</a>

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