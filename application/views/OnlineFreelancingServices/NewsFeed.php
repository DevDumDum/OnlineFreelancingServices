<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php 
if($this->session->userdata('UserLoginSession'))
{
    $udata = $this->session->userdata('UserLoginSession');
}
else
{
    redirect(base_url('index.php/Loginpage'));
}
?>

<body id="newsfeed">
    <div class="container-newsfeed">
        <div class="row custom-row-container" style="margin-right: 0;">
            <div class="col-3 pl-0 work-category-side sticky-top">
                <!-- for filtering category-->
                <!--Work:-->
                <div class="card bg-light-custom mb-3">
                    <div class="card-header">Work Category Filter</div>
                        <div class="card-body">
                            <p>
                            Type of Work:
                            <select name="Work">
                                <option value="null">----</option>
                                    <?php if(!empty($key_works)) { foreach($key_works as  $w){ ?>
                                        <option value="<?php echo $w['ID'];?>"> <?php echo $w['profession_type'];?> </option>
                                    <?php }} ?>
                            </select>
                            </p>             
                        <!--Location:-->
                        <div class="location-filter">
                            <p>Location: <input type="text" name="location"></p>
                            <p>Province: <input type="text" name="province"></p>
                            <p>City: <input type="text" name="City"></p> 
                        </div>
                        <button type="button" class="btn btn-success work-category-apply" name="category">Apply</button> 
                    </div>
                </div>
            </div>
            <div class="col-8 newsfeed-side">
                <!--AddPost button display create post at line 23 event-->
                <div class="card bg-light-custom mb-3 card-width">
                    <div class="card-header"><h1>Finding A Job? A worker? Post now!</h1></div>
                        <div class="card-body">
                        <button type="button" class="btn btn-primary btn-lg" onclick="AddPostPopUp()">Add Post</button>
                    </div>
                </div>
                <!--PopUp createPost-->
                <div id="hiddenbox-nf">
                    <!--Add post-->
                    <div id="add_p" style="display: none;">
                        <div id="bg_box-nf">
                            <div class="modal-header-nf">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2"><h1>Create Post</h1></div>
                                    <div class="p-2"><button type="button" class="btn btn-secondary btn-lg rounded-circle" class="close-button" onclick="hidebox()">&times;</button></div>
                                </div>
                            </div>
                            <div class="create-post">
                                    <form action="<?=base_url('Post_controller/addPost')?>" method="post" enctype="multipart/form-data">
                                        <div class="add-post-content btn-block">
                                            <input type="text" name="poster_name" value="<?php echo $udata['id'];?>" style="display:none">
                                                <p>
                                                    <label for="">Work Category</label>
                                                    <select name="work" id="works">
                                                        <?php if(!empty($key_works)) { foreach($key_works as  $w){ ?>
                                                            <option value="<?php echo $w['ID'];?>"> <?php echo $w['profession_type'];?> </option>
                                                        <?php }} ?>
                                                    </select>
                                                    <button type="button" class="btn btn-secondary" name="addWorkPost">+</button><br>

                                                    <label for="">Description</label>
                                                    <input type="text" name="description" id="desc" placeholder="Requirements" required /> <br>

                                                    <label for="">Worker(s) needed</label>
                                                    <input type="number" name="worker-count" id="worker_count" value="1" max="100" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null">
                                                    
                                                    <label for="">Location</label>
                                                    <input type="text" name="location" id="location" placeholder="Work location" required /> <br>
                                                    
                                                    <label for="">Minimum Payment</label>
                                                    <input type="number" name="min-pay" id="min_pay" value="" max="100" min="1" placeholder="None" disabled oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null">
                                                    
                                                    <label for="">Fixed</label>
                                                    <input type="checkbox" id="min-checker" checked onclick="set_min_pay(this)"> <br>
                                                    
                                                    <label for="">Maximum Payment</label>
                                                    <input type="number" name="max-pay" id="max_pay" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null" required /> 
                                                </p>
                                            
                                            <input type="file" name="fileToUpload" id="fileToUpload"><br>
                                            <input type="submit" class="btn btn-block btn-primary btn-sm p-3" value="Post" name="submit">
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                        
                    <!--Report post-->
                    <div id="report_p" style="display: none;">
                        <div id="bg_box-nf">
                            <div class="modal-header-nf">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2"><h1>Report Post</h1></div>
                                    <div class="p-2"><button type="button" class="btn btn-secondary btn-lg rounded-circle" class="close-button" onclick="hidebox()">&times;</button></div>
                                </div>
                            </div>
                            <div class="create-post">
                                <br>
                                Description:<br>
                                <textarea id="r_desc" style="width:100%; height:150px;"></textarea><br>
                                <button id="r_id" value="">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div id="blackbox-nf" onclick="hidebox()"></div>
                </div>
                <div id="result"></div>
            </div>
        </div>
    </div>
    <br>
</body>

<script>
    var scrollLimit ,limit, offset;
    $(document).ready(function(){
        
        scrollLimit = Math.max($(document).height(), $(window).height());
        limit = 5;
        offset = 1;
        display_post_batch();
    })

    $(window).scroll(function(){

        var current = window.scrollY;
        var pos = current + window.innerHeight; 
        //console.log("Limit: "+ scrollLimit +" | Current: " + pos);

        if(pos >= scrollLimit) {
            display_post_batch();
        }
    })

    function display_post_batch(){
        for(var i=0; i<limit; i++){
            display_new_post();
            //console.log(offset);
            offset++;
        }
    }
    // FOR ADD POST!! FOR ADD POST!! FOR ADD POST!!
    function set_min_pay(c){
        if(c.checked){
            document.getElementById("min_pay").disabled=true;
            document.getElementById("min_pay").value="";
            document.getElementById("max_pay_label").textContent="Exact Amount";
        }else {
            document.getElementById('min_pay').value=1;
            document.getElementById('min_pay').disabled=false;
            document.getElementById("max_pay_label").textContent="Maximum Payment";
        }
    }
    function AddPostPopUp(){
        document.getElementById("hiddenbox-nf").style.display="block";
        document.getElementById("add_p").style.display="block";
        document.getElementById("hiddenbox-nf").style.animation="fadebox .3s reverse linear";
    }
    function hidebox(){
        document.getElementById("hiddenbox-nf").style.display="none";
        document.getElementById("add_p").style.display="none";
        document.getElementById("report_p").style.display="none";
    }
    function set_fixed(){
        var component = document.getElementById("min_pay");

        if(component.value == ""){
            document.getElementById("min-checker").checked = true;
            component.disabled = true;
            document.getElementById("max_pay_label").textContent="Exact Amount";
        }
    }
    function set_form_action(action,id){
        var loc = "<?=base_url('Post_controller/"+action+"')?>";
        document.getElementById("post_form").action = loc;
        document.getElementById("PostOptionMenu_"+id).remove();
        alert(loc);
    }
    function edit_post(id){
        document.getElementById("PostOptionMenu_"+id).style.display="none";
        AddPostPopUp();
        var s_wid = "op_" + id;

        document.getElementById(s_wid).selected = true;
    }

    function report_post(id){
        document.getElementById("hiddenbox-nf").style.display="block";
        document.getElementById("report_p").style.display="block";
    }

    function applicant(id,uid){
        $.ajax({
            type: 'POST',
            url:"<?=base_url('OnlineFreelancingServices/add_applicant');?>",
            data: {a_id : id , u_id : uid},
            success: function(response) {
                if(response.status == "success"){
                    alert("Application Request sent!");
                    document.getElementById('apply_'+id).disabled=true;
                }else{
                    alert("Request Timeout: User already Applied");
                    document.getElementById('apply_'+id).disabled=true;
                }
                alert("<?php echo $udata['jobs'];?>");
            }
        });
        console.log("Applied.");
    }

    function display_new_post(){
        const theFunction = "<?=base_url('Post_controller/get_from_offset'); ?>";
        $.post(theFunction, {postIndex: offset, postLimit: limit}, function(data, status){
            
            if(status=='success'){
                 
                let text = data;
                text = text.replace('[', '');
                text = text.replace(']', '');

                if(data != " "){
                    for(var x = 0; x<8; x++) text = text.replace('"', '');

                    const myArray = text.split(",");
                    var postArray = [];
                    postArray["name"] = myArray[0];
                    postArray["work"] = myArray[1];
                    postArray["id"] = myArray[2];
                    postArray["name_id"] = myArray[3];
                    
                    postArray['requirements'] = myArray[4];
                    postArray['worker_count'] = myArray[5];
                    postArray['applicants'] = myArray[6];
                    postArray['accepted'] = myArray[7];
                    postArray['apply_status'] = myArray[8];

                    postArray['location'] = myArray[9];
                    postArray['min_pay'] = myArray[10];
                    postArray['max_pay'] = myArray[11];
                    postArray['timestamp'] = myArray[12];
                    initPost(postArray);

                    // BIGGER DIV BETTER DIV; BIGGER BETTER
                    scrollLimit = Math.max($(document).height(), $(window).height());
                }
            }
        })
    }

    function initPost(postArray){
        var name = postArray["name"];
        var work = postArray["work"];
        var curID = postArray["id"];
        var owner = postArray["name_id"];
        var req = postArray['requirements'];
        var w_count = postArray['worker_count'];
        var a_count = postArray['applicants'];
        var accepted_count = postArray['accepted'];

        var loc = postArray['location'];
        var min_p = postArray['min_pay'];
        var max_p = postArray['max_pay'];
        var date = postArray['timestamp'];
        var apply_status = postArray['apply_status']; // if already applied

        /*
        console.log(
            "Name: "+name+
            "\nWork: "+work+
            "\nPost ID: "+curID+
            "\nName ID: "+owner+
            "\nReq: "+req+
            "\nWorkers #: "+w_count+
            "\nApplicants #: "+a_count+
            "\nAccepted #: "+accepted_count+
            "\nLocation: "+loc+
            "\nMinimum Pay: "+min_p+
            "\nMaximum Pay: "+max_p+
            "\nDate: "+date
        );
        */
        let post = [];

        post["post_"+curID] = document.createElement("div");
        post["post_"+curID].id = "post_"+curID;
        post["post_"+curID].className = "main_post";
        document.getElementById("result").appendChild(post["post_"+curID]);
        
        if( <?php echo $udata["id"];  ?> != owner) {
            post["report_p_"+curID] = document.createElement("BUTTON");
            post["report_p_"+curID].id = "report_p_"+curID;
            post["report_p_"+curID].style.float = "right";
            post["report_p_"+curID].innerHTML = "Report";
            post["report_p_"+curID].addEventListener ("click", function() {
                report_post(curID);
            });
            document.getElementById(post["post_"+curID].id).appendChild(post["report_p_"+curID]);
        } else {
            post["option_"+curID] = document.createElement("input");
            post["option_"+curID].id = "option_"+curID;
            post["option_"+curID].setAttribute("type", "button");
            post["option_"+curID].setAttribute("value", "option");
            post["option_"+curID].style.float = "right";
            post["option_"+curID].addEventListener ("click", function() {
                if(document.getElementById("PostOptionMenu_"+curID).style.display == "block"){
                    document.getElementById("PostOptionMenu_"+curID).style.display = "none"
                }else{
                    document.getElementById("PostOptionMenu_"+curID).style.display="block";
                }
            });
            document.getElementById(post["post_"+curID].id).appendChild(post["option_"+curID]);


            post["PostOptionMenu_"+curID] = document.createElement("div");
            post["PostOptionMenu_"+curID].id = "PostOptionMenu_"+curID;
            post["PostOptionMenu_"+curID].style.float = "right";
            post["PostOptionMenu_"+curID].style.marginTop = "30px";
            post["PostOptionMenu_"+curID].style.marginRight = "-80px";
            post["PostOptionMenu_"+curID].style.display = "none";

            document.getElementById(post["post_"+curID].id).appendChild(post["PostOptionMenu_"+curID]);

                post["edit_p_"+curID] = document.createElement("BUTTON");
                post["edit_p_"+curID].id = "edit_p_"+curID;
                post["edit_p_"+curID].setAttribute("value", curID);
                post["edit_p_"+curID].innerHTML = "Edit";
                post["edit_p_"+curID].addEventListener ("click", function() {
                    edit_post(curID);
                });
                document.getElementById(post["PostOptionMenu_"+curID].id).appendChild(post["edit_p_"+curID]);

                post["del_p_"+curID] = document.createElement("BUTTON");
                post["del_p_"+curID].id = "del_p_"+curID;
                post["del_p_"+curID].setAttribute("value", curID);
                post["del_p_"+curID].innerHTML = "Delete";
                post["del_p_"+curID].addEventListener ("click", function() {
                     set_form_action('deact_post',curID);
                });
                document.getElementById(post["PostOptionMenu_"+curID].id).appendChild(post["del_p_"+curID]);
            
        }

        post["a_"+curID] = document.createElement("a");
        post["a_"+curID].id = "a_"+curID;
        post["a_"+curID].href = 'Profilepage?id='+curID;
        document.getElementById(post["post_"+curID].id).appendChild(post["a_"+curID]);

        post["post_titlebar_"+curID] = document.createElement("div");
        post["post_titlebar_"+curID].id = "post_titlebar"+curID;
        post["post_titlebar_"+curID].className = "post_titlebar";
        document.getElementById(post["a_"+curID].id).appendChild(post["post_titlebar_"+curID]);

        post["user_image_"+curID] = document.createElement("div");
        post["user_image_"+curID].id = "user_image"+curID;
        post["user_image_"+curID].className = "userImage";
        document.getElementById(post["post_titlebar_"+curID].id).appendChild(post["user_image_"+curID]);

        post["name_"+curID] = document.createElement("p");
        post["name_"+curID].id = "name_"+curID;
        post["name_"+curID].innerHTML = name+" needs " + work;
        document.getElementById(post["post_titlebar_"+curID].id).appendChild(post["name_"+curID]);
        
        if( <?php echo $udata["id"];  ?> != owner) {
            
            post["apply_"+curID] = document.createElement("input"); 
            post["apply_"+curID].id = "apply_"+curID;
            post["apply_"+curID].className = "btn btn-primary btn-lg";
            post["apply_"+curID].setAttribute("type", "button");
            post["apply_"+curID].setAttribute("value", "Apply");
            post["apply_"+curID].style.float = "right";
            post["apply_"+curID].addEventListener ("click", function() {
                var proceed = confirm("Are you sure you want to proceed?");
                if (proceed) {
                    applicant(curID,<?php echo $udata['id'];?>);
                    document.getElementById(post["apply_"+curID].id).disabled=true;
                }
                
            });
            document.getElementById(post["post_"+curID].id).appendChild(post["apply_"+curID]);

            if(apply_status == 0){ // if current user already applied
                document.getElementById(post["apply_"+curID].id).disabled=true;
            }
        }

        post["container_"+curID] = document.createElement("div");
        post["container_"+curID].id = "container_"+curID;
        post["container_"+curID].className = "post-description-container";
        post["container_"+curID].innerHTML += 
        "Req: "+req+
        "<br>Workers #: "+w_count+
        "<br>Applicants #: "+a_count+
        "<br>Accepted #: "+accepted_count+
        "<br>Location: "+loc+
        "<br>Minimum Pay: "+min_p+
        "<br>Maximum Pay: "+max_p+
        "<br>Date: "+date+"<br><br>";
        document.getElementById(post["post_"+curID].id).appendChild(post["container_"+curID]);
    }
</script>

<!-- JavaScript Bundle with Popper -->
