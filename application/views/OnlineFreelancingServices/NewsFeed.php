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
    <button>Add Post</button><br>
    ==========================================
    <!--PopUp createPost-->
    <div>
        <form action="<?=base_url('Post_controller/addPost')?>" method="post" enctype="multipart/form-data">
            Create Post<br>
            <div>

            <input type="text" name="poster_name" value="<?php echo $udata['id'];?>" style="display:none">
                
                <select name="work" id="works">
                    <option value="null" >Select</option>

                    <?php if(!empty($key_works)) { foreach($key_works as  $w){ ?>
                        <option value="<?php echo $w['ID'];?>"> <?php echo $w['profession_type'];?> </option>


                    <?php }} ?>

                </select>
                <button name="addWorkPost">+</button>
            </div>

            <label for="">Description</label>
            <input type="text" name="description" id="desc" placeholder="Requirements"><br>

            <label for="">Worker(s) needed</label>
            <input type="number" name="worker-count" id="worker_count" value="1" max="100" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null"><br>
            
            <label for="">Location</label>
            <input type="text" name="location" id="location" placeholder="Work location"><br>

            <label for="">Minimum Payment</label>
            <input type="number" name="min-pay" id="min_pay" value="" max="100" min="1" placeholder="None" disabled oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null">
            
            <label for="">Fixed</label>
            <input type="checkbox" id="min-checker" checked onclick="set_min_pay(this)"><br>
            
            <label for="">Maximum Payment</label>
            <input type="number" name="max-pay" id="max_pay" value="1" max="100" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null"><br>
            
            <input type="file" name="fileToUpload" id="fileToUpload"><br>
            <input type="submit" value="submit" name="submit">
        </form>
    </div>

    <br>
    ==========================================
    <br>
    <?php include("inc/postResult.php"); ?>
    <br>
    ====================================================================================================================================<br>
    >Find Worker button clicked<br>
    ====================================================================================================================================
    <br>
    <?php include("inc/workResult.php"); ?>
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
</script>
</html>