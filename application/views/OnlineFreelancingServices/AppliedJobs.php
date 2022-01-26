<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php 
if($this->session->userdata('UserLoginSession'))
{
    $udata = $this->session->userdata('UserLoginSession');
}
else
{
    redirect(base_url('index.php/Loginpage'));
}
?>

<body>
    <!--BACK BUTTON-->
    <div class="container">
    <button class="btn" onclick="window.location.href='<?php echo base_url('NewsFeed');?>';">Back</button>
        <div class="btn_category">
            <button class="btn" onclick="window.location.href='AppliedJob';">Applied Jobs</button>
            <button class="btn" onclick="window.location.href='PostedJob';">Posted Jobs</button>
            <button class="btn" onclick="window.location.href='AcceptedJob';">Accepted Jobs</button>
        </div>
        <!---NEW USER TABLE-->
        <div class="tables">
            <table class = "table table-dark table-hover center">
                <tr>
                <th>Client</th>
                <th>Job</th>
                </tr>
                
                <div>
                    <tr>
                    <td onclick="newDetails()">
                        <span>Alfreds Futterskie<!--Client Name--></span>
                    </td>
                    <td>
                    <span>Alfreds Futterskie<!--Job Description--></span>                        
                    </td>
                </div>
             
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