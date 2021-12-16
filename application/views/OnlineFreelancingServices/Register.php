<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body class="registerBody">

    <div class="container-fluid container_custom">    
        <form method="post" autocomplete="off" action="<?=base_url('Register_controller/adduser')?>" style="height:100%;">
            <div class="row register-row_custom">
                <div class="col-md-6 no-gutters registerLeftSide">
                    <div class="justify-content-center align-items-center">
                        <h1 class ="registerWelcome">WELCOME</h1>

                        <div class="logo">  
                            <img src="<?php echo base_url();?>public/images/logo.png" class ="mx-auto d-block" alt="" height="70">
                        </div>
                         
                        <h5 class="registerCreate">Create a New Account</h5>
                        <p class="registerAlready">Already have an account? 
                        <span><a href="Loginpage" class="loginLink link-light">Log in</a></span></p>
                        
                            <div class="form-group" id = "insertform" >
                                <div class = "registerTextCont">
                                    <label for="first-name" class="customlabel" ><span>First Name</span></label> <br>
                                    <input name="first-name" type="text" placeholder="Ex. Juan" class="fn" required>
                                </div>

                                <div class = "registerTextCont">
                                    <label for="last-name" class="customlabel" ><span>Last Name</span></label> <br>
                                    <input name="last-name" type="text" placeholder="Ex. DelaCruz" class="ln" required>
                                </div>

                                <div class = "registerTextCont">
                                    <label for="middle-name" class="customlabel" ><span>Middle Name</span></label><br>
                                    <input name="middle-name" type="text" placeholder="Ex. Conje"class="mn">
                                </div>

                                <div class = "registerTextCont">
                                    <label for="contact" class="customlabel" ><span>Contact Number</span></label><br>
                                    <input name="contact" type="number"  placeholder="09xxxxxxxxx" class="cn" required>
                                </div>


                                <div class = "registerTextCont">
                                    <label for="email-address" class="customlabel" ><span>Email Address</span></label><br>
                                    <input id="email" onfocusout="check()" name="email" type="email" placeholder="you@example.com" class="ea" required>
                                </div>

                                <div class="registerTextCont" style="display:none;" id="errorEmail">
                                    <span title="Email already exists!" style="color:red;font-size:24px" class="glyphicon glyphicon-exclamation-sign "></span>
                                </div>

                                <div class="registerTextCont" style="display:none;" id="successEmail">
                                    <span title="Looks good!" style="color:#32CD32;font-size:24px" class="glyphicon glyphicon-ok"></span>
                                </div>

                                <div class = "registerTextCont">
                                    <label for="password" class="customlabel" ><span>Password</span></label><br>
                                    <input name="password" id="pw1" onfocusout="confirm_pass()" type="password" class="ps" required>
                                </div>

                                <div class = "registerTextCont">
                                    <label for="password" class="customlabel" ><span>Confirm Password</span></label><br>
                                    <input name="confirm-pw" id="pw2" onfocusout="confirm_pass()" type="password" class="Cps" required>
                                </div>

                                <div id="errorPW" style="display:none">
                                    <span  style="color:red;">Password does not match!</span><br><br>
                                </div>

                            </div>
                        </span>
                    </div>
                </div>

                
                <div class="col-md-6 no-gutters registerRightSide">
                    <div class = "registerOtherForms">
                        <label for="prof"><br><span>Birth Date</span></label> </br>
                            <span>
                                <label for="day" class="registerOtherCustomLabel"><span >Day:</span></label>
                                <select name="day" id="day" class="registerOtherCustomLabelSelection"></select>
                            </span>
                            <span>
                                <label for="month" class="registerOtherCustomLabel"><span>Month:</span></label>
                                <select name="month" id="month" class="registerOtherCustomLabelSelection"></select>
                            </span>
                            <span>
                                <label for="year" class="registerOtherCustomLabel"><span>Year:</span></label>
                                <select name="year" id="year" class="registerOtherCustomLabelSelection"></select>
                            </span>

                        <script src="<?php echo base_url();?>public/css/register.js"></script>
                        <br>

                        <label for="prof" class=""><br><span>Profession</span></br></label>
                        <div>
                            <select id="Work" class="registerOtherCustomLabelSelection">
                                <option value="null" >Select</option>
                                <option value="Work1">Carpenter</option>
                                <option value="Work2">Accountant</option>
                                <option value="Work3">Architect</option>
                                <option value="Work4">Cashier</option>
                                <option value="Work5">Web Developer</option>
                                <option value="Work6">Cleaner</option>
                                <option value="Work7">Data Encoder</option>
                                <option value="Work8">Electrician</option>
                                <option value="Work9">Engineer</option>
                                <option value="Work10">Teacher</option>
                            </select>

                            <button type="button" name="addWorkPost">+</button> 
                            <br>
                                <label for="Others" class="registerOtherCustomLabel">Other</label>
                                <input type="text" class="registerOtherCustomLabelSelection" placeholder="Ex. Lawyer">
                                <button type="button" name="addWorkPost">+</button>

                        </div>
                
                        <label for="id" class=""><br><span>Type of ID</span></br></label>
                        <div>
                            <select id="id" class="registerOtherCustomLabelSelection">
                                <option value="null">Select</option>
                                <option value="id1">Student ID</option>
                                <option value="id2">Driver's License</option>
                                <option value="id3">Philippine Passport</option>
                                <option value="id4">PhilHealth ID</option>
                                <option value="id5">UMID ID</option>
                                <option value="id6">Postal ID</option>
                                <option value="id7">Tin ID</option>
                                <option value="id8">Voter's ID</option>
                            </select>
                            
                            <button type="button" name="addWorkPost">+</button>
                            <br>
                            <label for="Others" class="registerOtherCustomLabel">Other</label>
                                <input type="text" class="registerOtherCustomLabelSelection" placeholder="Ex. National ID">
                                <button type="button" name="addWorkPost">+</button>

                            <br>
                            <br>
                            <label for="id" class="fs-5 text-uppercase fst-italic fw-bold text-center" style="color: #1e4e70">kindly provide a photo of your id</label>
                            <br>
                            <input type="file" class="registerfilebtn btn-basic btn-sm btn-block"  style="color: #1e4e70" value="Browse">
                            <br>

                        </div>
                        <?php if($this->session->flashdata('error')) {	?>
                            <p class="text-danger text-center" style="margin-top: 10px;">
                                <?=$this->session->flashdata('error')?>
                            </p>
                        <?php }else{ ?>
                        <br><br>
                        <?php } ?>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <a class="btn btn-outline-primary btn-lg" href="Homepage" role="button">BACK</a>
                            <button value="submit" id="form-pass" type="submit" class="btn btn-outline-dark btn-lg " style = "background-color:#1e4e70" disabled>
                                <span class ="fw-bold" style="color: #ffff ">REGISTER</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function check(){
            $.post('<?=base_url('validation/check');?>', {email: $('#email').val()}, function(data){

                if(document.getElementById("email").value!=""){
                    if(data.exists){
                        document.getElementById("errorEmail").style.display="";
                        document.getElementById("successEmail").style.display="none";
                    }else{
                        document.getElementById("errorEmail").style.display="none";
                        document.getElementById("successEmail").style.display="";
                    }
                }else{
                    document.getElementById("successEmail").style.display="none";
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
            document.getElementById("form-pass").disabled=false;
            }
        }else{
            document.getElementById("errorPW").style.display="none";
        }
      }
    </script>
</body>

    