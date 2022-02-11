<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body class="registerBody">

    <div class="registerContainer container-fluid">    
        <form method="post" onsubmit="return check_fill();" enctype="multipart/form-data" autocomplete="off" action="<?=base_url('Register_controller/adduser')?>" style="height:100%;">
            <div class="row register-row_custom">
                <div class="col-md-6 no-gutters registerLeftSide">
                    <div class="justify-content-center align-items-center">
                        <h1 class ="registerWelcome">WELCOME</h1>
                        <div class="logo">
                            <img class="img-fluid" src="<?php echo base_url();?>public/images/logo.png" class="d-inline-block align-text-top" alt="">
                        </div>
                         
                        <h5 class="registerCreate">Create a New Account</h5>
                        <p class="registerAlready">Already have an account? 
                        <span><a href="Loginpage" class="loginLink link-light">Log in</a></span></p>
                        
                            <div class="form-group" id = "insertform" >
                                <div class = "registerTextCont">
                                    <label for="first-name" class="customlabel" ><span>First Name</span></label> <br>
                                    <input name="first-name" type="text" placeholder="Ex. Juan" class="fn" required />
                                </div>

                                <div class = "registerTextCont">
                                    <label for="last-name" class="customlabel" ><span>Last Name</span></label> <br>
                                    <input name="last-name" type="text" placeholder="Ex. DelaCruz" class="ln" required />
                                </div>

                                <div class = "registerTextCont">
                                    <label for="middle-name" class="customlabel" ><span>Middle Name</span></label><br>
                                    <input name="middle-name" type="text" placeholder="Ex. Conje"class="mn">
                                </div>

                                <div class = "registerTextCont">
                                    <label for="contact" class="customlabel" ><span>Contact Number</span></label><br>
                                    <input name="contact" type="number" placeholder="09xxxxxxxxx" class="cn" required />
                                </div>


                                <div class = "registerTextCont">
                                    <label for="email-address" class="customlabel" ><span>Email Address</span></label><br>
                                    <input id="email" onfocusout="check()" name="email" type="email" placeholder="you@example.com" class="ea" required />
                                    <div class="registerTextCont" style="display:none;" id="errorEmail">
                                        <span title="Email already exists!" style="color:red;font-size:24px" class="glyphicon glyphicon-exclamation-sign "></span>
                                    </div>

                                    <div class="registerTextCont" style="display:none;" id="successEmail">
                                        <span title="Looks good!" style="color:#32CD32;font-size:24px" class="glyphicon glyphicon-ok"></span>
                                    </div>
                                </div>

                                <div class = "registerTextCont">
                                    <label for="password" class="customlabel" ><span>Password</span></label><br>
                                    <input name="password" id="pw1" onfocusout="confirm_pass()" type="password" class="ps" required />
                                </div>

                                <div class = "registerTextCont">
                                    <label for="password" class="customlabel" ><span>Confirm Password</span></label><br>
                                    <input name="confirm-pw" id="pw2" onfocusout="confirm_pass()" type="password" class="Cps" required />
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
                        <div id="profession">
                            <input type="number" name="profCount" id="profCount" value="1" disabled hidden /><!--counter-->
                            <input type="text" name="profession_id" id="allProf" hidden />
                            <select id="Work" name="Work" onchange="p_check(this.value,null)" class="P_registerOtherCustomLabelSelection">
                                <?php if(!empty($key_works)) { foreach($key_works as  $w){ ?>
                                    <option value="<?php echo $w['ID'];?>"> <?php echo $w['profession_type'];?> </option>
                                <?php }} ?>
                            </select>
                            <button type="button" onclick="addProf()" name="addWorkPost">+</button> 
                        </div>
                        <div id="otherProf">
                            <input type="number" name="otherProfCount" id="otherProfCount" value="1" disabled hidden /><!--counter-->
                            <input type="text" name="other_profession_id" id="allOtherProf" hidden />
                            <label style="position: absolute;margin-left: -50px;margin-top: 5px;" for="Others:" class="registerOtherCustomLabel">Others</label>
                            <input type="text" name="op_" id="op_" class="registerOtherCustomLabelSelection" onchange="op_check(this.value,'')" placeholder="Ex. Lawyer">
                            <input type="text" name="op_desc_" id="op_desc_" class="registerOtherCustomLabelSelection" placeholder="Descriptions">
                            <button type="button" onclick="addOtherProf()" name="addWorkPost">+</button>
                        </div>
                        <br>
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
                            <input name="valid_id" type="file" class="registerfilebtn btn-basic btn-sm btn-block"  style="color: #1e4e70" value="Browse">
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
    <script>
        function addProf(){
            if(document.getElementById("Work").value != 0){
                var pcount = document.getElementById("profCount").value;
                let status = 1;
                let w = "";
                let w_val = null;
                if(parseInt(pcount) != 1){
                    for(var x = 0; x < pcount; x++){
                        if(x != 0){
                            w_val = document.getElementById("Work"+x).value;
                        }else{
                            w_val = document.getElementById("Work").value;
                        }
                        if(w_val == 0) {
                            status = 0;
                        }
                    }
                }
                if(status == 1){
                    var prof=[];
                    br = document.createElement("br");
                    br.id = "br_"+pcount;
                    document.getElementById("profession").appendChild(br);
                    
                    prof["p_sel_"+pcount] = document.createElement("select");
                    prof["p_sel_"+pcount].name = "Work"+pcount;
                    prof["p_sel_"+pcount].id = "Work"+pcount;
                    prof["p_sel_"+pcount].className = "P_registerOtherCustomLabelSelection";
                    prof["p_sel_"+pcount].addEventListener ("change", function() {
                        p_check(this.value,pcount);
                    });
                    document.getElementById("profession").appendChild(prof["p_sel_"+pcount]);

                        <?php if(!empty($key_works)) { foreach($key_works as  $w) { ?>
                            prof["p_opt_"+pcount+"_<?php echo $w['ID'];?>"] = document.createElement("option");
                            prof["p_opt_"+pcount+"_<?php echo $w['ID'];?>"].value = "<?php echo $w['ID'];?>";
                            prof["p_opt_"+pcount+"_<?php echo $w['ID'];?>"].innerHTML = "<?php echo $w['profession_type'];?>";
                            document.getElementById("Work"+pcount).appendChild(prof["p_opt_"+pcount+"_<?php echo $w['ID'];?>"]);
                        <?php }} ?>

                        prof["p_btn_"+pcount] = document.createElement("button");
                        prof["p_btn_"+pcount].setAttribute("type", "button");
                        prof["p_btn_"+pcount].id = "p_btn_"+pcount;
                        prof["p_btn_"+pcount].value = pcount;
                        prof["p_btn_"+pcount].innerHTML = "-";
                        prof["p_btn_"+pcount].addEventListener ("click", function() {
                            remove_p(this.value);
                        });
                        document.getElementById("profession").appendChild(prof["p_btn_"+pcount]);

                    pcount++;
                    document.getElementById("profCount").value = pcount;
                }
            }
        }

        function addOtherProf(){
            if( document.getElementById("op_").value != "" && document.getElementById("op_desc_").value != ""){
                var pcount = document.getElementById("otherProfCount").value;
                var status = 0;
                
                if(pcount != 1){
                    status = 1;
                    for(var x = 1; x < parseInt(pcount); x++){
                        if(document.getElementById("op_"+x).value != "" && document.getElementById("op_desc_"+x).value != ""){
                            status++;
                        }
                    }
                }else{
                    status++;
                }
                if(status == pcount){
                    var prof=[];
                    br = document.createElement("br");
                    br.id = "br_op_"+pcount;
                    document.getElementById("otherProf").appendChild(br);
                    
                    prof["op_"+pcount] = document.createElement("input");
                    prof["op_"+pcount].setAttribute("type", "text");
                    prof["op_"+pcount].id = "op_"+pcount;
                    prof["op_"+pcount].name = "op_"+pcount;
                    prof["op_"+pcount].setAttribute("placeholder", "Ex. Lawyer");
                    prof["op_"+pcount].className = "registerOtherCustomLabelSelection";
                    prof["op_"+pcount].required = true;
                    prof["op_"+pcount].addEventListener ("focusout", function() {
                        op_check(this.value,pcount-1);
                    });
                    document.getElementById("otherProf").appendChild(prof["op_"+pcount]);

                    prof["op_desc_"+pcount] = document.createElement("input");
                    prof["op_desc_"+pcount].setAttribute("type", "text");
                    prof["op_desc_"+pcount].id = "op_desc_"+pcount;
                    prof["op_desc_"+pcount].name = "op_desc_"+pcount;
                    prof["op_desc_"+pcount].setAttribute("placeholder", "Descriptions");
                    prof["op_desc_"+pcount].required = true;
                    prof["op_desc_"+pcount].className = "registerOtherCustomLabelSelection";
                    prof["op_desc_"+pcount].addEventListener ("focusout", function() {
                        op_check(this.value,pcount-1);
                    });
                    document.getElementById("otherProf").appendChild(prof["op_desc_"+pcount]);

                        prof["op_btn_"+pcount] = document.createElement("button");
                        prof["op_btn_"+pcount].setAttribute("type", "button");
                        prof["op_btn_"+pcount].id = "op_btn_"+pcount;
                        prof["op_btn_"+pcount].value = pcount;
                        prof["op_btn_"+pcount].innerHTML = "-";
                        prof["op_btn_"+pcount].addEventListener ("click", function() {
                            remove_op(this.value);
                        });
                        document.getElementById("otherProf").appendChild(prof["op_btn_"+pcount]);

                    pcount++;
                    document.getElementById("otherProfCount").value = pcount;
                
                    let tempt = document.getElementById("allProf").value;
                    for(var x = 0; x < pcount-1; x++){
                        if(x == 0){
                            tempt = '"'+document.getElementById("op_").value+'"';
                            tempt += ',"'+document.getElementById("op_desc_").value+'"';
                        }else{
                            tempt += ',"'+document.getElementById("op_"+x).value+'"';
                            tempt += ',"'+document.getElementById("op_desc_"+x).value+'"';
                        }
                    }
                    document.getElementById("allOtherProf").value = tempt;
                }else{
                    alert("Fill other Profession title and Description")
                }
            }else{
                alert("Fill Profession title and Description")
            }
        }

        function p_check(val,id){
            let pcount = document.getElementById("profCount").value;
            let work = <?php echo "["; if(!empty($key_works)) { foreach($key_works as  $w){echo '"'.$w['profession_type'].'",';}} echo "]";?>;
            let status = 1;
            let w = "";
            let w_val = null;
            if(parseInt(pcount) != 1){
                for(var x = 0; x < pcount-1; x++){
                    if(x != 0){
                        w_val = document.getElementById("Work"+x).value;
                    }else{
                        w_val = document.getElementById("Work").value;
                    }
                    
                    if(val == w_val || w_val == 0) {
                        status = 0;
                        w = work[val];
                    }
                }
            }

            if(status == 0){
                alert("Profession: "+w.toUpperCase()+" already registered, please select on the suggestion tab");
                remove_p(parseInt(id)-1);
            }

            let tempt = document.getElementById("allProf").value;
            for(var x = 0; x < pcount; x++){
                if(x == 0){
                    tempt = document.getElementById("Work").value
                }else{
                    tempt += ","+document.getElementById("Work"+x).value
                }
            }
            document.getElementById("allProf").value = tempt;
        }

        function op_check(val,id){
            var pcount = document.getElementById("otherProfCount").value;
            let status = 1;
            let msg = "";
            //let work = <?php echo "["; if(!empty($key_works)) { foreach($key_works as  $w){echo '"'.$w['profession_type'].'",';}} echo "]";?>;

            <?php if(!empty($key_works)) { foreach($key_works as  $w){ ?>
                if(val.toLowerCase() == "<?php echo $w['profession_type'];?>".toLowerCase()) {
                    status = 0;
                    msg = "Profession: "+val+" already registered, please select on the suggestion tab";
                }
            <?php }} ?>

            let w = "";
            let w_val = null;
            if(parseInt(pcount) != 1){
                for(var x = 0; x < pcount-1; x++){
                    if(x != 0){
                        w_val = document.getElementById("op_"+x).value;
                    }else{
                        w_val = document.getElementById("op_").value;
                    }
                    if(val == w_val) {
                        status = 0;
                        msg = "Profession: "+val+":"+w_val+" already typed, input other profession";
                    }
                }
            }

            if(status == 0){
                alert(msg);
                if(id != '') {
                    remove_op(document.getElementById("op_btn_"+id).value);
                } else {
                    for(var x = 0; x < pcount-1; x++){
                        if(x == 0){
                            document.getElementById("op_").value=document.getElementById("op_1").value;
                            document.getElementById("op_desc_").value=document.getElementById("op_desc_1").value;
                        } else {
                            document.getElementById("op_"+x).value=document.getElementById("op_"+(x+1)).value;
                            document.getElementById("op_desc_"+x).value=document.getElementById("op_desc_"+(x+1)).value;
                        }
                    }
                    remove_op(pcount-1);
                }
                pcount--;
            }
            let tempt = document.getElementById("allOtherProf").value;
            for(var x = 0; x < pcount; x++){
                if(x == 0){
                    tempt = '"'+document.getElementById("op_").value+'"';
                    tempt += ',"'+document.getElementById("op_desc_").value+'"';
                }else{
                    tempt += ',"'+document.getElementById("op_"+x).value+'"';
                    tempt += ',"'+document.getElementById("op_desc_"+x).value+'"';
                }
            }
            document.getElementById("allOtherProf").value = tempt;
        }

        function remove_p(id){
            let pcount = document.getElementById("profCount").value;

            document.getElementById("Work"+id).remove();
            document.getElementById("p_btn_"+id).remove();
            document.getElementById("br_"+id).remove();
            document.getElementById("profCount").value = pcount-1;
                
            if(pcount != id){
                for(var x = parseInt(id)+1; x < pcount; x++){
                    document.getElementById("Work"+x).name = "Work"+(x-1);
                    document.getElementById("Work"+x).id = "Work"+(x-1);
                    document.getElementById("p_btn_"+x).value = x-1;
                    document.getElementById("p_btn_"+x).id = "p_btn_"+(x-1);
                    document.getElementById("br_"+x).id = "br_"+(x-1);
                }
            }
        }

        function remove_op(id){
            let pcount = document.getElementById("otherProfCount").value;

            document.getElementById("br_op_"+id).remove();
            document.getElementById("op_"+id).remove();
            document.getElementById("op_desc_"+id).remove();
            document.getElementById("op_btn_"+id).remove();
            document.getElementById("otherProfCount").value = pcount-1;
            if(pcount != id){
                for(var x = parseInt(id)+1; x < pcount; x++){
                    document.getElementById("op_"+x).name = "op_"+(x-1);
                    document.getElementById("op_desc_"+x).name = "op_desc_"+(x-1);
                    document.getElementById("br_op_"+x).id = "br_op_"+(x-1);
                    document.getElementById("op_"+x).id = "op_"+(x-1);
                    document.getElementById("op_desc_"+x).id = "op_desc_"+(x-1);
                    document.getElementById("op_btn_"+x).value = x-1;
                    document.getElementById("op_btn_"+x).id = "op_btn_"+(x-1);
                }
            }
        }

        function check_fill(){
            let w = document.getElementById("Work").value;
            let op = document.getElementById("op_").value;
            let op_d = document.getElementById("op_desc_").value;
            if( parseInt(w) == 0 && ( op == "" || op_d == "")) {
                alert("Please fill the profession section");
                return false;
            } else {
                return confirm('Do you really want to submit the form? ');
            }
        }

        function check(){
            $.post('<?=base_url('OnlineFreelancingServices/checkE');?>', {email: $('#email').val()}, function(data){

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
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

    