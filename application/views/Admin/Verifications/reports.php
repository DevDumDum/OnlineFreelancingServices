<?php 
if($this->session->userdata('UserLoginSession')){
    $udata = $this->session->userdata('UserLoginSession');
    $page = $this->session->userdata('page');
}else{
    redirect(base_url('AdminAuth/AdminLogin'));
}
?>
<body>
    <!--NAVBAR-->
    <header>
        <!--INSERT NAVBAR LINK HERE-->
    </header>
    <!---POP UP-->
    <div id="hiddenbox">
        <div id="bg_box">
            <div class="modal-header">
                <div class="title">User</div>
                    <button class="close-button" onclick="hidebox()">&times;</button>
                </div>
                <iframe id="view_r" src="" style="width: 100%; height: 100%;"></iframe>
            </div>
        <div id="blackbox" onclick="hidebox()">
        </div>
    </div>
    <!--BACK BUTTON-->
    <div class="container">
    <button class="btn" onclick="window.location.href='<?php echo base_url('AdminAuth/Dashboard');?>';">Back</button>
        <!---DASHBOARD BUTTONS-->
        <div class="dashboardButtons">
            <h1>VERIFICATION</h1>
            <p>(Reports)</p>
        </div>
        <!--VERIFICATION BUTTONS-->
        <div class="btn_category">
            <button class="btn" onclick="window.location.href='.';">New User</button>
            <button class="btn" onclick="window.location.href='VerifyRequest';">Deactivate Requests</button>
            <button class="btn" onclick="window.location.href='Report';" disabled>Reports</button>
            <button class="btn" onclick="window.location.href='VerifyJobCategory';">Job Category</button>
        </div>
        <!---NEW USER TABLE-->
        <div class="tables">
        <?php if($udata['user_type']=='admin'){?>
                    <select id="comboA" onchange="getComboA(this);">
                        <?php if($page === 'Report-User') {?>
                            <option value="user">USER</option>
                            <option value="post">POST</option>
                        <?php } else { ?>
                            <option value="post">POST</option>
                            <option value="user">USER</option>
                        <?php } ?>
                    </select>
                <?php } ?>
            <table class = "table table-dark table-hover center">
                <tr>
                    <th class="headings">User</th>
                    <th class="heading_desc">Details</th>
                    <th> </th>
                </tr>
            
                <tr>
                
                    <td onclick="newDetails()">
                        <span>Alfreds Futterskie</span>
                    </td>
                    <td></td>
                    <td class="status">
                        <button class="editbtn1" style="cursor: pointer;">Ban</button>
                        <button class="editbtn2" style="cursor: pointer;">Ignore</button>
                    </td>
                </tr>
                
                <?php if(!empty($key_v_list)) { foreach($key_v_list as $v){ $type = $v['type'];?>
                    <tr id="theTr_<?php echo $v['main_r_id'];?>">
                        <td onclick="newDetails('<?php echo $v['id_reported'];?>','<?php echo $v['type'];?>')">
                            <span class="user_details"><?php echo $v['name']?></span>
                        </td>
                        <td><?php echo $v['description'];?></td>
                        <td class="status">
                            <button type="button" class="editbtn1" style="cursor: pointer;" id="activate" onclick="accept_ver(<?php echo $v['v_id'];?>,<?php echo $v['main_r_id'];?>,'<?php echo $type;?>')">Ban</button>
                            <button type="button" class="editbtn2" style="cursor: pointer;" id="deactivate" onclick="deny_ver(<?php echo $v['v_id'];?>,<?php echo $v['main_r_id'];?>)">Ignore</button>
                        </td>
                    </tr>
                    <?php }} else {
                    echo "<tr><p>Other categories might have verifications left!</p></tr>";
                    }
                ?>
            </table>
        </div>
    </div>
    <script>
        function accept_ver(verify_id, user_id, type){
            var id = "theTr_" + verify_id.toString();
            $.post('<?=base_url('Verification_controller/accept_ver_rep');?>', {v_id: verify_id, u_id: user_id, type: type}, function(data){
                alert(verify_id);
                alert(data.msg);
                document.getElementById(id).remove();
            }, 'JSON');
        }
        
        function deny_ver(verify_id, user_id){
            var id = "theTr_" + verify_id.toString();
            $.post('<?=base_url('Verification_controller/reject_ver_rep');?>', {v_id: verify_id, u_id: user_id}, function(data){
                alert(data.msg);
                document.getElementById(id).remove();
            }, 'JSON');
        }

        function getComboA(sel) {
            var value = sel.value;
            if(value == 'user'){
                window.location.href='<?php echo base_url('Verifications/r_user');?>';
            }else{
                window.location.href='<?php echo base_url('Verifications/Report');?>';
            }
        }

        function newDetails(id, type){
            document.getElementById("hiddenbox").style.display="block";
            document.getElementById("hiddenbox").style.animation="fadebox .3s reverse linear";
            if (type == "report-p") {
                document.getElementById("view_r").src = "<?php echo  base_url('Postpage');?>?p_id="+id;
            } else {
                document.getElementById("view_r").src = "<?php echo  base_url('Profilepage');?>?id="+id;
            }
        }
        function hidebox(){
            document.getElementById("hiddenbox").style.display="none";
        }
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>