<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body class="profileBody">
    <div class="profileBody-container">
        <div class="cover-pic-div">
            <img src = "#" id="photoCover">
            <input type="file" id="file">
            <label for="file" id="uploadBtn">
                <div class="uploadingofcover">
                    <i class="fal fa-upload"></i><br>
                    <h3>Add banner image<h3>
                </div>  
            </label>
        </div>

        <div class="profile-wrapper">
            <div class="profile-container">
                <div class="profile-pic-div">
                    <img src = "#" id="photoProfile">
                    <input type="file" id="fileProfile">
                    <label for="file" id="uploadBtnProfile">Choose Photo</label>
                </div>
                <h1 class="profileUsername">Name</h1>
                <!---LOCATION---->
                <button class="editbutton" type="button" id ="editProfile">
                    <i class="editbuttonicon fal fa-pencil"></i>Edit Profile
                </button>
                <div class="switchBox">
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider">
                        <h4 id = "h4-status">Status</h4></span>
                    </label>
                </div>
            </div>

            <div class="col-md-9" style="float:right">
                <button type="button" class="messageprofilebtn btn btn-primary btn-sm">Message</button>
                <div class="profileDesc">
                    <label for="validationTextarea" class="form-label">Add Description</label>
                    <textarea class="form-control" id="validationTextarea" placeholder="Type here..." required></textarea>
                        <div class="descbuttons">
                            <button class="descprofilebtn btn btn-outline-secondary btn-sm" type="submit">Edit</button>
                            <button class="descprofilebtnsave btn btn-dark btn-sm" type="submit">Save</button>
                        </div>
                </div>
            </div>

            <div class="col-md-6 profileProjwrapper">
                <div class="profileProjContainer">
                    
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card">
                            <img src="#" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                            <img src="#" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                            <img src="#" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>

    </div>
    
    

    <!--

    <div class = "container-status"></div>
    

    <div class="container-description">
        <i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at congue urna. Vivamus gravida congue velit, nec dapibus leo hendrerit vel. Mauris consectetur et ex ac rutrum. Maecenas interdum sagittis leo ac commodo. Vivamus velit augue, imperdiet eu laoreet a, mattis a lacus. Nam sagittis massa malesuada ante mattis maximus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus volutpat metus vitae ipsum blandit vulputate. Morbi auctor urna interdum, auctor eros vitae, tristique orci. Praesent pharetra urna tristique orci bibendum fermentum. Aenean faucibus justo ac ipsum aliquam convallis. Aenean ultricies eget libero et ultrices. Nullam auctor nisl ac magna interdum, et consectetur est blandit. Proin eu gravida purus. In quis efficitur nibh. Vestibulum congue euismod massa in tristique.</i>
    </div>

    <div class="container-ratings">
        <h3 id="h3-ratings">RATINGS</h3>
    </div>-->

    <script src="public/css/profile.js"></script>
</body>
</html>