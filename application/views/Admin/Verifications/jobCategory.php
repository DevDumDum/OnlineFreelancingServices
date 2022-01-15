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
            <button class="btn" onclick="window.location.href='VerifyUser';">New User</button>
            <button class="btn" onclick="window.location.href='VerifyRequest';">Deactivate Requests</button>
            <button class="btn" onclick="window.location.href='VerifyReports';">Reports</button>
            <button class="btn" onclick="window.location.href='VerifyJobCategory';" disabled>Job Category</button>
        </div>
        <!---NEW USER TABLE-->
        <div class="tables">
            <table class = "table table-dark table-hover center" style="width:100%">
                <tr>
                    <th class="headings">User</th>
                    <th class="heading_desc">Description</th>
                    <th> </th>
                </tr>
                <tr>
                    <td onclick="newDetails()"><span>Alfreds Futterskie</span></td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium doloremque error exercitationem voluptates? Porro dolore laboriosam laborum, minus voluptate recusandae expedita distinctio quas officiis rem accusantium eaque mollitia, aliquam veritatis!</td>
                <td class="status_w">
                    <button class="editbtn1 editbtn1-jobCategory-responsiveness" style="cursor: pointer;">Accept</button>
                    <button class="editbtn2 editbtn2-jobCategory-responsiveness" style="cursor: pointer;">Decline</button>
                </td></tr>
                
                <tr>
                <td onclick="newDetails()"><span>Centro comercial</span></td>
                <td>Description</td>
                <td class="status_w">
                    <button class="editbtn1 editbtn1-jobCategory-responsiveness" style="cursor: pointer;">Accept</button>
                    <button class="editbtn2 editbtn2-jobCategory-responsiveness" style="cursor: pointer;">Decline</button>
                </td></tr>
            
                <tr>
                <td onclick="newDetails()"><span>Ernst Handel</span></td>
                <td>Description</td>
                <td class="status_w">
                    <button class="editbtn1 editbtn1-jobCategory-responsiveness" style="cursor: pointer;">Accept</button>
                    <button class="editbtn2 editbtn2-jobCategory-responsiveness" style="cursor: pointer;">Decline</button>
                </td></tr>
            
                <tr>
                <td onclick="newDetails()"><span>Island Trading</span></td>
                <td>Description</td>
                <td class="status_w">
                    <button class="editbtn1 editbtn1-jobCategory-responsiveness" style="cursor: pointer;">Accept</button>
                    <button class="editbtn2 editbtn2-jobCategory-responsiveness" style="cursor: pointer;">Decline</button>
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