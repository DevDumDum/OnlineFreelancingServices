<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moderator Register</title>
  </head>
  <body>
    <h1>Moderator Register</h1>
    <div class = "form-group">
        <label for="companyid" class="label-default">Company ID:</label>
        <input class="form-control" name="companyid" id="companyid" type="text">
    </div>

    <div class = "form-group">
        <label for="" class="label-default">Password:</label>
        <input class="form-control" name="password" id="password" type="password">
    </div>

    <div class = "form-group">
        <label for="" class="label-default">Confirm Password:</label>
        <input class="form-control" name="password2" id="password" type="password">
    </div>

    <div class = "form-group">
        <button class="btn btn-primary" name="register">Register</button>    
    </div>

    <button onclick="window.location.href='Login';">
      Back
    </button>


  </body>
</html>
