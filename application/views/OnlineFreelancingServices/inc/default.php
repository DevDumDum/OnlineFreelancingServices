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

    <center> <div class="work-location">
        <form action="#">
            <select name="Work">
                <option value="null">----</option>
                <option value="Work1">Work1</option>
                <option value="Work2">Work2</option>
                <option value="Work3">Work3</option>
            </select>
        </form>
    
        <form class="search-container">
            <input type="text" id="search-bar" name="location" placeholder="Search...">
            <button class="search-icon" type="submit" name="submit"><i class="fas fa-search"></i></button>        
        </form>
    </div>
    </div> </center>

</body>
</html>
