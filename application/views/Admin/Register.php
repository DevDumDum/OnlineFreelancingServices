<header>
		<nav class="navbar custom-navbar navbar-expand-md navbar-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="Homepage">
					<img class="img-fluid" src="<?php echo base_url();?>public/images/logo.png" alt="" width="120"
						class="d-inline-block align-text-top">
				</a>
				<ul class="nav justify-content-end">
					<li class="nav-item">
						<img class="img-fluid" src="<?php echo base_url();?>public/images/help.png" alt="" width="50">
					</li>
				</ul>
			</div>
		</nav>
</header>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Moderator Register</title>
</head>

<body class="modregisterpage">

  <div class="container container-custom">
    <h1>Moderator Register</h1>

    <form method="post" autocomplete="off" action="<?=base_url('Register_controller/addMod')?>">

      <div class="mb-3 mb-3_custom">
        <div class="form-text-company-id-padding">
          <label for="companyid" class="form-label">Company ID:</label>
        </div>
        <div class="form-padding">
          <input  type="form-control" id="companyid" name="companyid" class="form-control form-width" type="text" onfocusout="check()" required>
        </div>
      </div>

      <div class="textCont" style="display:none;" id="errorEmail">
        <span title="ID already exists!" style="color:red;font-size:24px" class="glyphicon glyphicon-exclamation-sign "></span>
      </div>

      <div class="textCont" style="display:none;" id="successEmail">
        <span title="Looks good!" style="color:#32CD32;font-size:24px" class="glyphicon glyphicon-ok"></span>
      </div>

      <div class="mb-3 mb-3_custom">
        <div class="form-text-password-padding">
          <label for="password" class="form-label">Password</label>
        </div>
        <div class="form-padding">
          <input id="pw1" onkeyup="confirm_pass()" type="password" name="password" class="form-control form-width" required>
        </div>
      </div>

      <div class="mb-3 mb-3_custom">
        <div class="form-text-confirm-password-padding">
          <label for="" class="form-label">Confirm Password:</label>
        </div>
        <div class="form-padding">
          <input id="pw2" onkeyup="confirm_pass()" type="password" name="password2" class="form-control form-width" required>
        </div>
      </div>

      <div id="errorPW" style="display:none">
      <span  style="color:red;">Password does not match!</span><br><br>
    </div>

      <div class="text-center text-button">
        <button type="button" class="btn btn-light border border-primary back-custom-color"><a href="AdminLogin">BACK</a></button>
        <button type="submit" id="form-pass" class="btn btn-primary button-custom-color" disabled>Register</button>
      </div>

    </form>
  </div>
</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function check(){
    $.post('<?=base_url('validation/check');?>', {email: $('#companyid').val()}, function(data){

    if(document.getElementById("companyid").value!=""){
      if(data.exists){
        document.getElementById("errorEmail").style.display="";
        document.getElementById("successEmail").style.display="none";
      }else{
        document.getElementById("errorEmail").style.display="none";
        document.getElementById("successEmail").style.display="";
      }
    }else{
      document.getElementById("successEmail").style.display="none";
      document.getElementById("form-pass").disabled=true;
    }

    }, 'JSON');
  }

  function confirm_pass(){
        
    const pswrd_1 = document.getElementById("pw1").value;
    const pswrd_2 = document.getElementById("pw2").value;
    
    if(pswrd_1!="" && pswrd_2!=""){
      if(pswrd_1 != pswrd_2){
        document.getElementById("errorPW").style.display="";
        document.getElementById("form-pass").disabled=true;
      }else {
        document.getElementById("errorPW").style.display="none";
        document.getElementById("form-pass").disabled="";
      }
    }else {
      document.getElementById("errorPW").style.display="none";
    }
  }
  </script>

</body>

</html>
