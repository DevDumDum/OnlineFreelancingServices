<?php 
if($this->session->userdata('UserLoginSession')){
    $udata = $this->session->userdata('UserLoginSession');
}else{
    redirect(base_url('AdminAuth/AdminLogin'));
}
?>
<body>
  <?php echo $udata['user_type'];?>

  <div class="AdminLP">
      <img src="<?php echo base_url();?>public/images/logo.png" width="100%">

    <ul class="menu">
      <li><button onclick="window.location.href='ManageUser';">
      Manage User Status
      </button></li>

      <li><button onclick="window.location.href='<?php echo base_url('Verifications');?>';">
      Verification
      </button></li>

      <li><button onclick="window.location.href='ViewLogs';">
      Logs
      </button></li>
    </ul>
  </div>

</body>
</html>