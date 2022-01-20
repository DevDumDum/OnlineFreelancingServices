<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body class="profileBody">
    <div class="profileBody-container">
        <div class="row-profile">
            <div class="col-12 profilebanner">
                <div class="cover-pic-div">
                    <img src = "#" id="photoCover">
                    <input type="file" id="file">
                        <label for="file" id="uploadBtn">
                            <div class="uploadingofcover">
                                <i class="fal fa-upload"></i><br>
                                <h3>Add banner image<h3>
                            </div>  
                        </label>
                        <!---INSERT REMOVE PHOTO BUTTON--->
                </div>
            </div>

            <div class="col-12 profile-wrapper">
                <div class="col-10 profilecontent">
                    <div class="profile-container">
                        <div class="profile-pic-div">
                            <img src = "#" id="photoProfile">
                            <input type="file" id="fileProfile">
                            <label for="file" id="uploadBtnProfile">Choose Photo</label>
                        </div>
                        <!---INSERT CODE LOCATION---->
                        <h1 class="profileUsername">Name</h1>

                        <div class="switchBox">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider">
                                <h4 id = "h4-status">Status</h4></span>
                            </label>
                        </div>
                    </div>

                    <div class="col-9 profilebuttons">
                        <div class="button-sameline">
                            <form method="POST" action="">
                                <div class="profile-button">
                                    <div class="mx-2"  id="editDiv" style="display: block;"> 
                                        <button class="editprofilebutton btn btn-primary btn-sm" type="button" id ="editProfile" onclick="switchEdit()">
                                            <i class="editprofilebtnicon fal fa-pencil"></i>Edit Profile
                                        </button>
                                    </div>

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

                                    <div class="rightbutton">
                                        <button type="button" class="messageprofilebtn btn btn-primary btn-sm">Message</button>
                                    </div>
                                </div>        
                            </form>

                            <div class="profile-input">
                                <input class="inputCont" type="text" id="" name="description" placeholder="Add description" disabled value="">
                            </div>
                        </div>
                    </div>

                <div class="col-12 profile-calendar-conts">
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

                    <div class="profile-projCont">
                        <div class="profileProjwrapper">
                            <div class="profileProjContainer">
                                <div class="row row-cols-1 row-cols-md-3 g-4">
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

                        <div class="col-3">
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

                            <div class="info-cont d-flex flex-column bd-highlight mb-3">
                                <div class="p-2 bd-highlight">
                                EDUCATIONAL ATTAINMENT<input class="eduAttainment" type="text" id="" name="eduAttainment" placeholder="+" disabled value="">
                                </div>
                            </div>
                            <div class="info-cont d-flex flex-column bd-highlight mb-3">
                                <div class="p-2 bd-highlight">
                                EXPERTISE<input class="expertise" type="text" id="" name="expertise" placeholder="+" disabled value="">
                                </div>
                            </div>
                            <div class="info-cont d-flex flex-column bd-highlight mb-3">
                                <div class="p-2 bd-highlight">
                                CONTACT INFORMATION<input class="contact-info" type="text" id="" name="contact-info" placeholder="+" disabled value="">
                                </div>
                            </div>
                                

                            

                        </div>
                    </div>

                

            </div>

                    
                
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url("public/css/profile.js")?>"> </script>

</body>
</html>