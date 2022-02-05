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
            <p>(Job Categories)</p>
        </div>
        <!--VERIFICATION BUTTONS-->
        <div class="btn_category">
            <button class="btn" onclick="window.location.href='.';">New User</button>
            <button class="btn" onclick="window.location.href='VerifyRequest';">Deactivate Requests</button>
            <button class="btn" onclick="window.location.href='Report';">Reports</button>
            <button class="btn" onclick="window.location.href='VerifyJobCategory';" disabled>Job Category</button>
        </div>
        <!---NEW USER TABLE-->
        <div class="tables">
            <table class = "table table-dark table-hover center" style="width:100%">
                <tr>
                    <th class="headings">Title</th>
                    <th class="heading_desc">Description</th>
                    <th></th>
                </tr>

                <?php if(!empty($key_v_list)) { foreach($key_v_list as $v){?>
                    <tr id="theTr_<?php echo $v['v_id'];?>">
                        <td>
                            <span><?php echo $v['profession_type'];?></span>
                        </td>
                        <td>
                            <?php echo $v['description'];?>
                        </td>
                        <td class="status_w">
                            <button type="button" class="editbtn1 editbtn1-jobCategory-responsiveness" style="cursor: pointer;" id="activate" onclick="accept_ver(<?php echo $v['v_id'];?>,<?php echo $v['ID'];?>)">Activate</button>
                            <button type="button" class="editbtn2 editbtn2-jobCategory-responsiveness" style="cursor: pointer;" id="deactivate" onclick="deny_ver(<?php echo $v['v_id'];?>,<?php echo $v['ID'];?>)">Deactivate</button>
                        </td>
                    </tr>
                <?php }} else {
                        echo "<tr><p>Other categories might have verifications left!</p></tr>";
                    }?>
            </table>
        </div>
    </div>

    <script>
        function accept_ver(verify_id, prof_id){
            var id = "theTr_" + verify_id.toString();
            $.post('<?=base_url('Verification_controller/accept_ver_prof');?>', {v_id: verify_id, u_id: prof_id}, function(data){
                alert(data.msg);
                document.getElementById(id).remove();
            }, 'JSON');
        }
        
        function deny_ver(verify_id, prof_id){
            var id = "theTr_" + verify_id.toString();
            $.post('<?=base_url('Verification_controller/reject_ver_prof');?>', {v_id: verify_id, u_id: prof_id}, function(data){
                alert(data.msg);
                document.getElementById(id).remove();
            }, 'JSON');
        }
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>