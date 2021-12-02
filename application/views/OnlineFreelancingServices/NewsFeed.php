<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <?php 
    if($this->session->userdata('UserLoginSession')){
        $udata = $this->session->userdata('UserLoginSession');
        echo 'Welcome'.' '.$udata['username'];
    }
    else{
        redirect(base_url('Project/OnlineFreelancingServices/Loginpage'));
    }
    ?>
    <?php include("inc/navbar.php") ?>
</header>
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