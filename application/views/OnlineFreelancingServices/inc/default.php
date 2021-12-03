<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/homepage.css"/>
    <title>Homepage</title>

</head>
<body>
  
        <center>
        <form class="search-container">
            <input type="text" id="search-bar" name="location" placeholder="Search...">
            <button class="search-icon" type="submit" name="submit"><i class="fas fa-search"></i></button>        
        </form>
        </center>

        <center>
            <form action="#">
            <select name="Work" style="background-color: #FFFFFF; height: 45px; width: 25% ;border-radius: 15px">
                <option value="null" style="display: none;">-----</option>
                <option value="Work1">Work 1</option>
                <option value="Work2">Work 2</option>
                <option value="Work3">Work 3</option>
            </select>
        </form>  
        </center>

</body>
</html>
