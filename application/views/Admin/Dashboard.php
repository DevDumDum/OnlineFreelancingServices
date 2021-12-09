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
  </body>
</html>