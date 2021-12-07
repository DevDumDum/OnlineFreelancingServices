<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moderator Register</title>
  </head>
  <body>
  <h1>Moderator Register</h1>  

  <form method="post" autocomplete="off" action="<?=base_url('index.php/Register_controller/addMod')?>">


    <div class = "form-group">
        <label for="companyid" class="label-default">Company ID:</label>
        <input class="form-control" name="companyid" id="companyid" type="text" value="<?php echo set_value('companyid');?>">
    </div>

    <div class = "form-group">
        <label for="" class="label-default">Password:</label>
        <input class="form-control" name="password" id="password" type="password" value="<?php echo set_value('password');?>">
    </div>

    <div class = "form-group">
        <label for="" class="label-default">Confirm Password:</label>
        <input class="form-control" name="password2" id="password" type="password" value="<?php echo set_value('password2');?>">
    </div>

    <div class = "form-group">
        <button type="submit" class="btn btn-primary" name="register">Register</button>    
    </div>

    <button type="submit" onclick="window.location.href='Login';">
      Back
    </button>

    <?php echo validation_errors(); ?>    

  </form>


  </body>
</html>
