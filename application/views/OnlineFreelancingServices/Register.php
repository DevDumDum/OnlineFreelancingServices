<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOMEZ, AILEEN B.</title>
</head>

<header>
    <?php include("inc/navbar.php") ?>
</header>

<body>

    <form method="post" autocomplete="off" action="<?=base_url('Register_controller/add')?>">

    
        <div class="form-group">
            <label for="first-name " class="">First name</label>
            <input name="first-name" type="text" class="form-control" placeholder="Ex. Maku">

            <br>

            <label for="last-name " class="">Last name</label>
            <input name="last-name" type="text" class="form-control" placeholder="Ex. Aren">

            <br>

            <label for="middle-name " class="">Middle name</label>
            <input name="middle-name" type="text" class="form-control" placeholder="Ex. V.">

            <br>

            <label for="contact" class="">Contact Number</label>
            <input name="contact" type="number" class="form-control" placeholder="09xxxxxxxxx">

            <br>
            
            <label for="email-address" class="">Email Address</label>
            <input name="email-address" type="email" class="form-control" placeholder="you@example.com">

            <br>

            <label for="password" class="">Password</label>
            <input name="password" type="password" class="form-control">

            <br>

            <label for="password" class="">Confirm Password</label>
            <input name="password" type="password" class="form-control">

            <br>

            <label for="id" class="">id</label>
            <input type="button" value="Browse">
          

            <label for="nickname" class="">Nickname</label>
            <input type="button" value="Browse">


        </div>
        
        <div>
            <select name="Work">
                <option value="null">----</option>
                <option value="Work1">Work1</option>
                <option value="Work2">Work2</option>
                <option value="Work3">Work3</option>
            </select>
            <button name="addWorkPost">+</button>
        </div>

        <button type="submit" value="Submit" onclick="window.location.href='Loginpage';">Submit</button>
    </form>

</body>
</html>