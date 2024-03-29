<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
if ($this->session->userdata('UserLoginSession')){
    $udata = $this->session->userdata('UserLoginSession');
}
?>

<!-- THIS IS FOR POP UP -->
<script>
        function newDetails(){
            document.getElementById("hiddenbox-profile").style.display="block";
            document.getElementById("hiddenbox-profile").style.animation="fadebox .3s reverse linear";
        }
        function hidebox(){
            document.getElementById("hiddenbox-profile").style.display="none";
        }
</script>

<body class="profileBody">
    <div class="profileBody-container">
        <div class="row-profile">
            <div class="profilebanner d-flex col-12">
                <div class="cover-pic-div" <?php if(isset($_GET['admin'])) { ?> style="margin-top:0px !important;" <?php } ?>>
                    <?php if ($ProfBanner != ""){?>
                        <img src="<?= base_url() ?>uploads/users/<?php echo $_GET["id"];?>/<?= $ProfBanner ?>" id="photoCover">
                    <?php } else {?>
                        <img src="<?= base_url() ?>public/images/sample.png" id="photoCover">
                     <?php } ?>  
                    <input type="file" id="file" onchange="uploadBanner(this);" name="cover_pic" accept="image/*">
                    <label for="file" id="uploadBtn">
                        <div class="uploadingofcover">
                        <i class="fal fa-upload"></i><br>
                        <h3>Add banner image<h3>
                        </div>  
                    </label>           
                </div>
            </div>   

            <div class="profile-wrapper col-12">
                <div class="profilecontent col-3 border-right py-2">
                    <div class="profile-container d-flex flex-column align-items-center text-center py-5 ">

                        <div class="profile-pic-div">
                        <?php if ($ProfPic != ""){
                            ?>
                            <img src="<?= base_url() ?>uploads/users/<?php echo $_GET["id"];?>/<?= $ProfPic ?>" id="photoProfile">
                            <?php } else {?>
                                <img src="<?= base_url() ?>public/images/sample.png" id="photoCover">
                            <?php } ?>  
                            <input type="file" id="fileProfile" onchange="uploadProfile(this);" name="profile_pic" accept="image/*">
                            <label for="fileProfile" id="uploadBtnProfile">Choose Photo</label>
                        </div>

                        <div class="profileName">
                            <span class="profile-name font-weight-bold"><!--db-->
                                <?php echo $full_name; ?>
                            </span>
                        </div>

                        <div class="switchBox">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider">
                                <h4 id = "h4-status">Status</h4></span>
                            </label>
                        </div>

                    </div>

                    <div class="profile-calendar-conts">
                        <div class="container_calendar">
                            <div class="calendar">
                                <div class="month">
                                    <i class="fas fa-angle-left prev"></i>
                                    <div class="date">
                                        <h1></h1>
                                        <p></p>
                                    </div>
                                    <i class="fas fa-angle-right next"></i>
                                </div>

                                <div class="weekdays">
                                    <div>Sun</div>
                                    <div>Mon</div>
                                    <div>Tue</div>
                                    <div>Wed</div>
                                    <div>Thu</div>
                                    <div>Fri</div>
                                    <div>Sat</div>
                                </div>
                                
                                <div class="days"></div>
                            </div>
                        </div>

                    </div>

                    <div class="location">
                        <p id = location-profile> 
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.200523654514!2d120.97700491449882!3d14.644555779924874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b5c7b9e0893d%3A0x5a409de362168821!2sC-3%2C%20Grace%20Park%20West%2C%20Caloocan%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1642690241288!5m2!1sen!2sph" 
                                width="300" height="200" style="border: 1rem;" allowfullscreen="" loading="lazy">
                            </iframe>
                        </p>
                    </div>
                </div>

                <div class="profilebuttons col-md-12">
                    <div class="buttons-container d-flex flex-column text-center py-3">
                        <form method="POST" action="">
                            <div class="profile-button d-flex align-items-center justify-content-between">
                                <?php if(isset($_GET['id']) && ($_GET['id'] == $udata['id'] ) && (!(isset($_GET['admin'])))){?>
                                <div class="mx-2"  id="editDiv" style="display: block;">
                                    <button class="editprofilebutton btn btn-primary btn-sm" type="button" id ="editProfile" onclick="switchEdit()">
                                        <i class="editprofilebtnicon fal fa-pencil"></i>Edit Profile
                                    </button>
                                </div>

                                <div class="changebuttons d-flex">
                                    <div class="mx-2" id="saveDiv" style="display: none;"> 
                                        <button  button type="submit" class="saveprofilebutton btn btn-primary btn-sm">
                                            Save
                                        </button>
                                    </div> 
                    
                                    <div class="mx-2" id="cancelDiv" style="display: none;"> 
                                        <button  button type="submit" class="cancelprofilebutton btn btn-sm" onclick="switchCancel()">
                                            Cancel
                                        </button>
                                    </div>
                                </div>

                                <!-- THIS IS FOR POP UP -->
                                <?php } else {?> 
                                    <div id="hiddenbox-profile">
                                        <div id="bg_box-profile" style="display: none;">
                                            <div class="modal-header-profile">
                                                <div class="title">CONTACT ME</div>
                                                <button type="button" class="btn btn-secondary btn-lg rounded-circle" class="close-button" onclick="hidebox()">&times;</button>
                                            </div>
                                            <div>
                                                <p class="description-message-1"> <b>Email:</b> firstname.lastname@tup.edu.ph</p>
                                                <p class="description-message-2">  lastname.firstname@yahoo.com </p>
                                                <p class="description-message-3"> <b>Contact Number:</b> +639123456789 </p>
                                                <p class="description-message-4">  8 2887704 </p>
                                            </div>
                                        </div>

                                        <div id="report_p" style="display: none; margin-top:20rem; text-align:left;">
                                            <div id="bg_box-nf">
                                                <div class="modal-header-nf">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="p-2"><h1>Report Post</h1></div>
                                                        <div class="p-2"><button type="button" class="btn btn-secondary btn-lg rounded-circle" class="close-button" onclick="hidebox()">&times;</button></div>
                                                    </div>
                                                </div>
                                                <div class="create-post">
                                                    <br>
                                                    Description:<br>
                                                    <textarea id="r_desc" style="width:100%; height:150px;"></textarea><br>
                                                    <button id="r_id" type="button" value="" onclick="report_p(this.value)">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <div id="blackbox" onclick="hidebox()" style="padding: 0px;">
                                    </div>
                                    </div>

                                    <div class="rightbutton">
                                    <button type="button" class="messageprofilebtn btn btn-primary btn-sm" onclick="newDetails()">  Message </button>
                                    <?php if(!(isset($_GET['admin']))) { ?>
                                        <button type="button" class="messageprofilebtn btn btn-primary btn-sm" onclick="report_post(<?php echo $_GET['id'];?>)">  Report </button>
                                    <?php } ?>
                                    </div>
                                <?php }?>
                            </div>

                            <div class="form-group">
                            <textarea class="inputCont" type="text" id="" name="description" placeholder="Add description" value="<?php echo $summary; ?>" disabled></textarea>
                            </div>

                            <div class="profileProjwrapper col-9">
                                <div class="profileProjContainer">
                                    <div class="row row-cols-1 row-cols-3 g-4">
                                        <div class="col">
                                            <div class="card">
                                                <img src="./public/images/sample.png" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="card">
                                                <img src="./public/images/sample.png" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="card">
                                                <img src="./public/images/sample.png" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="rightcont col-3">
                                <div class="container-ratings">
                                    <h3 id="h3-ratings">RATINGS</h3>
                                    <div class = "rating">
                                        <input type="radio" name="star" id="star1"> <label for="star1"></label>
                                        <input type="radio" name="star" id="star1"> <label for="star2"></label>
                                        <input type="radio" name="star" id="star1"> <label for="star3"></label>
                                        <input type="radio" name="star" id="star1"> <label for="star4"></label>
                                        <input type="radio" name="star" id="star1"> <label for="star5"></label>
                                    </div>
                                </div>

                                <div class="info-cont d-flex flex-column bd-highlight mb-4">
                                    <div class="p-2 bd-highlight">
                                        EDUCATIONAL ATTAINMENT
                                        <input class="eduAttainment" type="text" id="" name="eduAttainment" placeholder="Currently not set." value="<?php echo $education_id ?>" disabled>
                                    </div>
                                </div>

                                <div class="info-cont d-flex flex-column bd-highlight mb-3">
                                    <div class="p-2 bd-highlight">
                                    EXPERTISE<input class="expertise" type="text" id="" name="expertise" placeholder="Currently not set." value="<?php echo $work ?>" disabled>
                                    </div>
                                </div>

                                <div class="info-cont d-flex flex-column bd-highlight mb-3">
                                    <div class="p-2 bd-highlight">
                                    CONTACT INFORMATION<input class="contact-info" type="text" id="" name="contact-info" placeholder="Currently not set." value="<?php echo $contact ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if($_GET['id'] == $udata['id']){?>
        <script type="text/javascript" src="<?php echo base_url("public/css/profile.js")?>"> </script>
        <script>
            const uploadBanner = el => {
                const files = el.files
                if (files.length > 0) {
                    const file = files[0]
                    const formData = new FormData()
                    formData.append('file', file);
                    formData.append('user_id', '<?php echo $_GET["id"];?>');
                    formData.append('file_type', 'cover')
                    fetch('<?= base_url() ?>OnlineFreelancingServices/upload_profile', {
                        method: 'POST',
                        body: formData
                        })
                        .then(res => res.json())
                        .then(data => {
                        console.log(data)
                        })
                        .catch(err => console.log(err))
                }
            }

            const uploadProfile = el => {
                const files = el.files
                if (files.length > 0) {
                const file = files[0]
                const formData = new FormData()
                formData.append('file', file);
                formData.append('user_id', '<?php echo $_GET["id"];?>')
                formData.append('file_type', 'profile')
                fetch('<?= base_url() ?>OnlineFreelancingServices/upload_profile', {
                    method: 'POST',
                    body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                    console.log(data)
                    }).catch(err => console.log(err))
                //     .then(res => res.json())
                //     .then(data => {
                //       console.log(data)
                //       document.querySelector('#profile').src = data.secure_url
                //     })
                //     .catch(err => console.log(err))
                }
            }
        </script>
    <?php }?>
    <script>
        function newDetails(){
            document.getElementById("hiddenbox-profile").style.display="block";
            document.getElementById("hiddenbox-profile").style.animation="fadebox .3s reverse linear";
            document.getElementById("bg_box-profile").style.display="block";
            document.getElementById("report_p").style.display="none";
        }
        
        function hidebox(){
            document.getElementById("hiddenbox-profile").style.display="none";
            document.getElementById("bg_box-profile").style.display="none";
            document.getElementById("report_p").style.display="none";
        }
        function report_post(id){
            document.getElementById("hiddenbox-profile").style.display="block";
            document.getElementById("bg_box-profile").style.display="none";
            document.getElementById("report_p").style.display="block";
            document.getElementById("r_id").value=id;
        }

        function report_p(id){
        var desc = document.getElementById("r_desc").value;
        var uid = <?php echo $udata["id"]; ?>;
        $.ajax({
            type: 'POST',
            url:"<?=base_url('OnlineFreelancingServices/report');?>",
            data: {r_id : id , desc : desc, type: "report-u"},
            success: function(response) {
                alert(response);
                document.getElementById("r_desc").value="";
                document.getElementById("r_id").value="";
                document.getElementById("hiddenbox-profile").style.display="none";
                document.getElementById("report_p").style.display="none";
            }
        });
    }
    </script>
</body>
</html>