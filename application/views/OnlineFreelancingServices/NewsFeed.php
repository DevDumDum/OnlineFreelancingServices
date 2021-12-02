<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php 
if($this->session->userdata('UserLoginSession'))
{
    $udata = $this->session->userdata('UserLoginSession');
    echo 'Welcome'.' '.$udata['username'];
}
else
{
    redirect(base_url('index.php/OnlineFreelancingServices/Loginpage'));
}
?>

<body>
    <?php include("inc/postResult.php"); ?>
    <br>
    ====================================================================================================================================<br>
    >Find Worker button clicked<br>
    ====================================================================================================================================
    <br>
    <?php include("inc/workResult.php"); ?>
</body>
</html>