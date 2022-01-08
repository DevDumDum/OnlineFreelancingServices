<body class="modregisterpageBody">
  <div class="modcontainer container-fluid">
    <form method="post" autocomplete="off" action="<?=base_url('Register_controller/addMod')?>">

      <div class="row modregister-row_custom">
        <div class="col-md-6 no-gutters modregisterLeftSide">
            <div class="justify-content-center align-items-center">
              <img class="img-fluid" src="<?php echo base_url();?>public/images/logo.png" 
              class ="modlogo mx-auto d-block" alt="" height="70">

              <p class="modregisterAlready">Already have an account? 
              <span><a href="AdminLogin" class="modloginLink link-light">Log in</a></span></p>

            </div>
        </div>

        <div class="col-md-6 no-gutters modregisterRightSide">
            <h1 class="modregH1">Moderator Register</h1>
            <div class="regadinsertform">
                <div class="modForms">
                  <div class="mb-3 mb-3_custom">
                    <div class="regadform form-text-company-id-padding">
                      <label for="companyid" class="form-label">Company ID:</label>
                    </div>
                    <div class="form-padding-register">
                      <input id="companyid" name="companyid" class="regadID form-control form-width" type="text" onfocusout="check()" required>
                    </div>
                    <div id="errorEmail" class="textCont" style="display:none;">
                      <span title="ID already exists!" style="color:red;font-size:24px" class="icon-warning-sign">❗ ID already exists</span>
                    </div>

                    <div id="successEmail" class="textCont" style="display:none;">
                      <span title="Looks good!" style="color:#32CD32;font-size:24px" class="fa-check">✔️</span>
                    </div>
                  </div>

                  <div class="mb-3 mb-3_custom">
                    <div class="regadform form-text-passwords-padding">
                      <label for="password" class="form-label">Password</label>
                    </div>
                    <div class="form-padding-register">
                      <input id="pw1" onkeyup="confirm_pass()" type="password" name="password" class="regadpass form-control form-width" required>
                    </div>
                  </div>

                  <div class="mb-3 mb-3_custom">
                    <div class="regadform form-text-confirm-passwords-padding">
                      <label for="" class="form-label">Confirm Password</label>
                    </div>
                    <div class="form-padding-register">
                      <input id="pw2" onkeyup="confirm_pass()" type="password" name="password2" class="regadcpass form-control form-width" required>
                    </div>
                  </div>
                </div>

                <div id="errorPW" style="display:none">
                  <span  style="color:red;">Password does not match!</span><br><br>
                </div>
            </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                  <button type="button" class="regadbackbtn btn-outline-primary btn-sm"><a href="AdminLogin">BACK</a></button>
                  <button type="submit" id="form-pass" class="regadbtn btn-outline-dark btn-sm" style = "background-color:#1e4e70" disabled>
                      <span class ="fw-bold" style="color: #ffff ">REGISTER</span>
                  </button>
                </div>

      
        </div>
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
