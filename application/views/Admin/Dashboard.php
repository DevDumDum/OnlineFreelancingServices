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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </body>
</html>