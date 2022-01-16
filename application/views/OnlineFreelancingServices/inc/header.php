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
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/addpost.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/navbar.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/register.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/loginpage.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/homepage.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/contactus.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/profile.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/mediaquery.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,600;1,300&display=swap" rel="stylesheet">
    <!--link for ratings-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title><?php echo $page?></title>
</head>