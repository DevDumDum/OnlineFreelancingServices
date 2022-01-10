<body>
    <!---POP UP-->
    <div id="hiddenbox">
        <div id="bg_box">
            <div class="modal-header">
                <div class="title">User</div>
                    <button class="close-button" onclick="hidebox()">&times;</button>
                </div>
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
            <p>(Deactivate Requests)</p>
        </div>
        <!--VERIFICATION BUTTONS-->
        <div class="btn_category">
            <button class="btn" onclick="window.location.href='VerifyUser';">New User</button>
            <button class="btn" onclick="window.location.href='VerifyRequest';" disabled>Deactivate Requests</button>
            <button class="btn" onclick="window.location.href='VerifyReports';">Reports</button>
            <button class="btn" onclick="window.location.href='VerifyJobCategory';">Job Category</button>
        </div>
        <!---NEW USER TABLE-->
        <div class="tables">
            <table class = "table table-dark table-hover center">
                <tr>
                    <th>User</th>
                    <th> </th>
                </tr>

                <?php if(!empty($key_v_list)) { foreach($key_v_list as $v){?>

                    <tr id="theTr_<?php echo $v['v_id'];?>">
                        <td onclick="newDetails()">
                            <span class="user_details"><?php echo $v['name']?>'s post ID: <?php echo $v['p_id'];?></span>
                        </td>
                        
                        <td class="status">
                            <button type="button" class="editbtn1" style="cursor: pointer;" id="activate" onclick="accept_ver(<?php echo $v['v_id'];?>,<?php echo $v['p_id'];?>)">Activate</button>
                            <button type="button" class="editbtn2" style="cursor: pointer;" id="deactivate" onclick="deny_ver(<?php echo $v['v_id'];?>,<?php echo $v['p_id'];?>)">Deactivate</button>

                            <input hidden type="number" id="verify_id" value="<?php echo $v['v_id'];?>">
                            <input hidden type="number" id="user_id" value="<?php echo $v['p_id'];?>">
                        </td>                        
                    </tr>
                <?php }} else {
                    echo "<tr><p>Other categories might have verifications left!</p></tr>";
                }?>
            
            </table>
        </div>
    </div>
    <script>        
        function accept_ver(verify_id, user_id){
            var id = "theTr_" + verify_id.toString();
            $.post('<?=base_url('Verification_controller/post_accept_ver');?>', {v_id: verify_id, p_id: user_id}, function(data){
                alert(data.msg);
                document.getElementById(id).style.display="none";
            }, 'JSON');
        }
        
        function deny_ver(verify_id, user_id){
            var id = "theTr_" + verify_id.toString();
            $.post('<?=base_url('Verification_controller/post_reject_ver');?>', {v_id: verify_id, p_id: user_id}, function(data){
                alert(data.msg);
                document.getElementById(id).style.display="none";
            }, 'JSON');
        }

        function newDetails(){
            document.getElementById("hiddenbox").style.display="block";
            document.getElementById("hiddenbox").style.animation="fadebox .3s reverse linear";
        }
        function hidebox(){
            document.getElementById("hiddenbox").style.display="none";
        }
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>