<!doctype html>
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
    <button onclick="window.location.href='';">
    Change Password
    </button>

    <button onclick="window.location.href='ManageUser';">
    Manage User Status
    </button>

    <button onclick="window.location.href='Verifications';">
    Verification
    </button>

    <button onclick="window.location.href='ViewLogs';">
    Logs
    </button>

    <button type="button" class="btn btn-primary button-custom-color"><a href="AdminLogout">Logout</a>


  </body>
</html>