<?php 
if($this->session->userdata('UserLoginSession')){
    $udata = $this->session->userdata('UserLoginSession');
}else{
    redirect(base_url('AdminAuth/AdminLogin'));
}
?>

<!-- Bakit ayaw ma-link ng css file? AaAaAAaaaaaAa -->
<link rel="stylesheet" href="<?php echo base_url();?>public/css/dashboard.css">

<body>
  <?php echo $udata['user_type'];?>

<!-- Insert ko muna dito -->
  <style>
    button {
      border: none; 
      background: none;
    }
    button:hover {
      color:#289cc1;
    }
  </style>

<!-- Online Freelancing Platform's Logo -->
  <div class="container mt-0">
      <div class="text-center">
        <img class="dashboardlogo" src="<?php echo base_url();?>public/images/logo.png" style="min-width: 60%; max-width: 80%;">
      </div>
  </div>

<!-- Menu buttons -->
  <div class="row text-center" style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; margin: 0 50px 0 50px">
      <div class="col-sm mt-4">
        <button onclick="window.location.href='ManageUser';">
          Manage User Status
        </button></div>
      <div class="col-sm mt-4">
        <button onclick="window.location.href='<?php echo base_url('Verifications');?>';">
          Verification
        </button></div>
      <div class="col-sm mt-4">
        <button onclick="window.location.href='ViewLogs';">
          Logs
        </button></div>
      </div>
  </div>

</body>
</html>