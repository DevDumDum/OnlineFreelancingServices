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

<body id="newsfeed">
    <div class="container-newsfeed">
        <div class="row custom-row-container">
            <div class="col-3 pl-0 work-category-side sticky-top">
                <!-- for filtering category-->
                <!--Work:-->
                <div class="card bg-light mb-3">
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
                <div class="card bg-light mb-3 card-width">
                    <div class="card-header"><h1>Finding A Job? A worker? Post now!</h1></div>
                        <div class="card-body">
                        <button type="button" class="btn btn-primary btn-lg" onclick="AddPostPopUp()">Add Post</button>
                    </div>
                    <div id="PostOptionMenu" style="display:none;">
                        <button type="button" id="edit_p" value="" onclick="edit_post(this.value)">Edit</button>
                        <button type="button" id="del_p" value="" onclick="set_form_action('deact_post')">Delete</button>
                    </div>
                </div>
                <!--PopUp createPost-->
                <div id="hiddenbox-nf">
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
                                        <input type="button" class="btn btn-block btn-primary btn-sm p-3" value="Post" name="submit">
                                    </div>
                                </form>
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

    function set_min_pay(c){
        if(c.checked){
            document.getElementById("min_pay").disabled=true;
            document.getElementById("min_pay").value="";
        }else {
            document.getElementById('min_pay').value=1;
            document.getElementById('min_pay').disabled=false;
        }
    }
    function AddPostPopUp(){
            document.getElementById("hiddenbox-nf").style.display="block";
            document.getElementById("hiddenbox-nf").style.animation="fadebox .3s reverse linear";
        }
    function hidebox(){
        document.getElementById("hiddenbox-nf").style.display="none";
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
    }

</script>
<script>
    function set_form_action(action){
        var loc = "<?=base_url('Post_controller/"+action+"')?>";
        document.getElementById("post_form").action = loc;
        alert(loc);
    }
    
    function edit_post(id){
        document.getElementById("PostOptionMenu").style.display="none";
        AddPostPopUp();
        var s_wid = "op_" + id;

        document.getElementById(s_wid).selected = true;
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
</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>