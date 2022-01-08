<?php 
if($this->session->userdata('UserLoginSession')){
    $udata = $this->session->userdata('UserLoginSession');
}else{
    redirect(base_url('AdminAuth/AdminLogin'));
}
?>
<body class="AdminBody">
    <div class="AdminContainer">
        <div class="AdminGlass">

            <div class="AdminID">
              <?php echo $udata['user_type'];?>
            </div>
            
            <img class="AdminLogo" src="<?php echo base_url();?>public/images/logogif-unscreen.gif">

            <div class="AdminLP">
              <ul class="Adminmenu">
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

        </div>   
    </div>
</body>
</html>