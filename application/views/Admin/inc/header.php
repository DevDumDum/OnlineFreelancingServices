<?php 
if($this->session->userdata('page')){
    $page = $this->session->userdata('page');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $page?></title>

    <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,600;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
    <!--ADMIN--->
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/adminloginpage.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/adminregisterpage.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/navbar.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/adminnavbar.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/mediaquery.css"/>
    <script src="https://kit.fontawesome.com/526f4a34dd.js" crossorigin="anonymous"></script>
    <!--VERIFICATION-->
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/verification.css"/>
</head>