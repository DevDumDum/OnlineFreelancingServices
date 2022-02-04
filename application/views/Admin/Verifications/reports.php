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
            <button class="btn" onclick="window.location.href='VerifyUser';">New User</button>
            <button class="btn" onclick="window.location.href='VerifyRequest';">Deactivate Requests</button>
            <button class="btn" onclick="window.location.href='VerifyReports';" disabled>Reports</button>
            <button class="btn" onclick="window.location.href='VerifyJobCategory';">Job Category</button>
        </div>
        <!---NEW USER TABLE-->
        <div class="tables">
        <?php if($udata['user_type']=='admin'){?>
                    <select id="comboA" onchange="getComboA(this);">
                        <?php if($page === 'Verification-Moderator') {?>
                            <option value="mod">Mod</option>
                            <option value="user">User</option>
                        <?php } else { ?>
                            <option value="user">User</option>
                            <option value="mod">Mod</option>
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
                </td></tr>
                
                <tr>
                <td onclick="newDetails()">
                    <span>Centro comercial</span>
                </td>
                <td></td>
                <td class="status">
                    <button class="editbtn1" style="cursor: pointer;">Ban</button>
                    <button class="editbtn2" style="cursor: pointer;">Ignore</button>
                </td></tr>
            
                <tr>
                <td onclick="newDetails()">
                    <span>Ernst Handel</span>
                </td>
                <td></td>
                <td class="status">
                    <button class="editbtn1" style="cursor: pointer;">Ban</button>
                    <button class="editbtn2" style="cursor: pointer;">Ignore</button>
                </td></tr>
            
                <tr>
                <td onclick="newDetails()">
                    <span>Island Trading</span>
                </td>
                <td></td>
                <td class="status">
                    <button class="editbtn1" style="cursor: pointer;">Ban</button>
                    <button class="editbtn2" style="cursor: pointer;">Ignore</button>
                </td></tr>
             
            </table>
        </div>
    </div>
    <script>
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