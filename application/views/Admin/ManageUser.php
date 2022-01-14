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
            <h1>Manage User Status</h1>
            <div class="btn_category">
            <button class="btn" onclick="window.location.href='';">Moderator</button>
            <button class="btn" onclick="window.location.href='';">User</button>
    </div>
        </div>
        <!---NEW USER TABLE-->
        <div class="tables">
            <table class = "table table-dark table-hover center">
                <tr>
                <th>User</th>
                <th> </th>
                </tr>
                
                <div>
                <tr>
                <td onclick="newDetails()">
                    <span>Alfreds Futterskie</span>
                </td>
                </div>
                <td class="status">
                    <button class="editbtn1 editbtn1-responsiveness" style="cursor: pointer;" id="activate">Activate</button>
                    <button class="editbtn2 editbtn2-responsiveness" style="cursor: pointer;" id="deactivate">Deactivate</button>
                </td></tr>
            
                <tr>
                <td onclick="newDetails()">
                    <span>Centro comercial</span>
                </td>                
                <td class="status">
                    <button class="editbtn1 editbtn1-responsiveness" style="cursor: pointer;">Activate</button>
                    <button class="editbtn2 editbtn2-responsiveness" style="cursor: pointer;">Deactivate</button>
                </td></tr>
            
                <tr>
                <td onclick="newDetails()">
                    <span>Ernst Handel</span>
                </td>
                <td class="status">
                    <button class="editbtn1 editbtn1-responsiveness" style="cursor: pointer;">Activate</button>
                    <button class="editbtn2 editbtn2-responsiveness" style="cursor: pointer;">Deactivate</button>
                </td></tr>
            
                <tr>
                <td onclick="newDetails()">
                    <span>Island Trading</span>
                </td>                
                <td class="status">
                    <button class="editbtn1 editbtn1-responsiveness" style="cursor: pointer;" >Activate</button>
                    <button class="editbtn2 editbtn2-responsiveness" style="cursor: pointer;">Deactivate</button>
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

