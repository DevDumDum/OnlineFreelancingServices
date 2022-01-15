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
            <h1>User Logs</h1>
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
                <th>Activities</th>
                </tr>
                
                <div>
                <tr>
                <td onclick="newDetails()">
                    <span>Alfreds Futterskie</span>
                </td>
                </div>
                <td>Created a Post</td>
            
                <tr>
                <td onclick="newDetails()">
                    <span>Centro comercial</span>
                </td>                
                <td>Applied for a job</td>
                </tr>
            
                <tr>
                <td onclick="newDetails()">
                    <span>Ernst Handel</span>
                </td>
                <td>Hired for a job</td>
                </tr>
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



