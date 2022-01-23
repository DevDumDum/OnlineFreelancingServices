<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php 
if($this->session->userdata('UserLoginSession'))
{
    $udata = $this->session->userdata('UserLoginSession');
    echo 'Welcome'.' '.$udata['email'];
}
else
{
    redirect(base_url('index.php/Loginpage'));
}
?>

<body>

    <br><br><br>
    <div>
        <!-- for filtering category-->
        <!--Work:-->
        Type of Work:
        <select name="Work">
            <option value="null">----</option>
                <?php if(!empty($key_works)) { foreach($key_works as  $w){ ?>
                    <option value="<?php echo $w['ID'];?>"> <?php echo $w['profession_type'];?> </option>
                <?php }} ?>
        </select><br><br>

        <!--Location:-->
        Location:<br>
        Province: <input type="text" name="province"><br>
        City: <input type="text" name="City"><br>
        <button name="category">Apply</button>
    </div>
    <br>
    ==========================================
    <br>
    <!--AddPost button display create post at line 23 event-->
    <button onclick="AddPostPopUp()">Add Post</button><br><br>

    <div id="PostOptionMenu" style="display:none; position: absolute;">
        <button type="button" id="edit_p" value="" onclick="edit_post(this.value)">Edit</button>
        <button type="button" id="del_p" value="" onclick="set_form_action('deact_post')">Delete</button>
    </div>
    <br>
    ==========================================
    <!--PopUp createPost-->

    <div id="hiddenbox"><br> 
       <div id="bg_box">
            <div class="modal-header-custom">
                <h1>Create Post</h1>
                <button class="close-button" onclick="hidebox()">&times;</button>
            </div>
            <div  class="create-post">
                <form action="<?=base_url('Post_controller/addPost')?>" method="post" enctype="multipart/form-data">
                    <div>

                        <input type="text" name="poster_name" value="<?php echo $udata['id'];?>" style="display:none">

                            <label for="">Work Category</label>
                            <select name="work" id="works">

                                <?php if(!empty($key_works)) { foreach($key_works as  $w){ ?>
                                    <option id="op_<?php echo $w['ID'];?>" value="<?php echo $w['ID'];?>"> <?php echo $w['profession_type'];?> </option>
                                <?php }} ?>

                            </select>
                            <button name="addWorkPost">+</button>
                    </div>
                        <div>
                            <label for="">Description</label>
                            <input type="text" name="description" id="desc" placeholder="Requirements" required><br>

                            <label for="">Worker(s) needed</label>
                            <input type="number" name="worker-count" id="worker_count" value="1" max="100" min="1" 
                                oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : 1 required"><br>
                            
                            <label for="">Location</label>
                            <input type="text" name="location" id="location" placeholder="Work location" required><br>

                            <label for="">Minimum Payment</label>
                            <input type="number" name="min-pay" id="min_pay" value="" max="100" min="1" placeholder="None" disabled 
                                oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null" onfocusout="set_fixed()"
                            >
                            
                            <label for="">Fixed</label>
                            <input type="checkbox" id="min-checker" checked onclick="set_min_pay(this)"><br>
                            
                            <label for="" id="max_pay_label">Exact Amount</label>
                            <input type="number" name="max-pay" id="max_pay" value="1" max="100" min="1" 
                                oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null" required><br>
                            
                            <input type="file" name="fileToUpload" id="fileToUpload"><br>
                            <input type="submit" value="submit" name="submit">
                        </div>
                </form>
            </div>
        </div>
        <div id="blackbox" onclick="hidebox()">
        </div>
    </div>
    <br>
    ==========================================
    <br>
        <div id="result"></div>
    <br>
</body>

<script>

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
        document.getElementById("hiddenbox").style.display="block";
        document.getElementById("hiddenbox").style.animation="fadebox .3s reverse linear";
    }
    function hidebox(){
        document.getElementById("hiddenbox").style.display="none";
    }

    function set_fixed(){
        var component = document.getElementById("min_pay");

        if(component.value == ""){
            document.getElementById("min-checker").checked = true;
            component.disabled = true;
            document.getElementById("max_pay_label").textContent="Exact Amount";
        }
    }
    
    // QUESTIONABLE! QUESTIONABLE! QUESTIONABLE! QUESTIONABLE!
    function set_form_action(action){
        var loc = "<?=base_url('Post_controller/"+action+"')?>";
        document.getElementById("post_form").action = loc;
        alert(loc);
    }

    function edit_post(id){

        document.getElementById("PostOptionMenu").style.display="none";
        AddPostPopUp();
        
        var s_wid = "op_" + id;

        alert(s_wid);

        document.getElementById(s_wid).selected = true;
    }

    function set_form_action(action){
        var loc = "<?=base_url('Post_controller/"+action+"')?>";
        document.getElementById("post_form").action = loc;
        alert(loc);
    }
    
    function edit_post(id){
        document.getElementById("PostOptionMenu").style.display="none";
        AddPostPopUp();
        
        var s_wid = "op_" + id;

        alert(s_wid);

        document.getElementById(s_wid).selected = true;
    } // QUESTIONABLE END
    
    // FOR DYNAMIC NEWSFEED !! FOR NEWSFEED !! FOR NEWSFEED !!
    function initPost(postArray){
        var name = postArray["name"];
        var work = postArray["work"];
        var curID = postArray["id"];
        var owner = postArray["name_id"];

        alert(
            "Name: "+name+
            "\nWork: "+work+
            "\nPost ID: "+curID+
            "\nName ID: "+owner
        );

        let post = [];

        post["post_"+curID] = document.createElement("div");
        post["post_"+curID].id = "post_"+curID;
        post["post_"+curID].className = "main_post";
        post["post_"+curID].style.height ="400px";
        post["post_"+curID].style.width ="400px";
        post["post_"+curID].style.marginBottom ="50px";
        post["post_"+curID].style.backgroundColor ="lightblue";
        document.getElementById("result").appendChild(post["post_"+curID]);

        post["post_titlebar_"+curID] = document.createElement("div");
        post["post_titlebar_"+curID].id = "post_titlebar_"+curID;
        post["post_titlebar_"+curID].style.height ="100px";
        post["post_titlebar_"+curID].style.width ="100%";
        post["post_titlebar_"+curID].style.backgroundColor ="grey";
        document.getElementById(post["post_"+curID].id).appendChild(post["post_titlebar_"+curID]);

        post["user_image_"+curID] = document.createElement("div");
        post["user_image_"+curID].id = "user_image"+curID;
        post["user_image_"+curID].className = "userImage";
        post["user_image_"+curID].style.height ="50px";
        post["user_image_"+curID].style.width ="50px";
        post["user_image_"+curID].style.backgroundColor ="red";
        document.getElementById(post["post_titlebar_"+curID].id).appendChild(post["user_image_"+curID]);

        post["name_"+curID] = document.createElement("p");
        post["name_"+curID].id = "name_"+curID;
        post["name_"+curID].innerHTML = name+" needs " + work;
        document.getElementById(post["post_titlebar_"+curID].id).appendChild(post["name_"+curID]);
        
        if( <?php echo $udata["id"];  ?> == owner) {
            
            post["option_"+curID] = document.createElement("input");
            post["option_"+curID].id = "option_"+curID;
            post["option_"+curID].setAttribute("type", "button");
            post["option_"+curID].setAttribute("value", "option");
            post["option_"+curID].style.float = "right";
            post["option_"+curID].addEventListener ("click", function() {
                document.getElementById("edit_p").value=curID;
                document.getElementById("del_p").value=curID;
                document.getElementById("PostOptionMenu").style.display="block";
            });
            document.getElementById(post["post_titlebar_"+curID].id).appendChild(post["option_"+curID]);
            
        }else {
            post["apply_"+curID] = document.createElement("input"); 
            post["apply_"+curID].id = "apply_"+curID;
            post["apply_"+curID].setAttribute("type", "button");
            post["apply_"+curID].setAttribute("value", "Apply");
            post["apply_"+curID].style.float = "right";
            post["apply_"+curID].addEventListener ("click", function() {
                alert(curID);
            });
            document.getElementById(post["post_"+curID].id).appendChild(post["apply_"+curID]);
        }
    }
    
    var scrollLimit ,limit, offset;
    $(document).ready(function(){
        
        scrollLimit = Math.max($(document).height(), $(window).height());
        limit = 5;
        offset = limit;
    })

    $(window).scroll(function(){

        var current = window.scrollY;
        var pos = current + window.innerHeight; 
        console.log("Limit: "+ scrollLimit +" | Current: " + pos);

        if(pos >= scrollLimit) {
            
            // REMOVE COMMENT BEFORE DEVELOPMENT DEPLOY! REMOVE COMMENT BEFORE DEVELOPMENT DEPLOY!

            //for(var i=0; i<limit; i++){
                display_new_post();
                offset++;
            //}

            // REMOVE COMMENT BEFORE DEVELOPMENT DEPLOY! REMOVE COMMENT BEFORE DEVELOPMENT DEPLOY!

        }
    })
    
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
            
                    initPost(postArray);
                    
                    // BIGGER DIV BETTER DIV; BIGGER BETTER
                    scrollLimit = Math.max($(document).height(), $(window).height());
                }

            }

        })
    }
    
</script>

<!-- JavaScript Bundle with Popper -->
