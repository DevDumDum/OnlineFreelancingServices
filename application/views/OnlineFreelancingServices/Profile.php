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
                <button type="button" id ="editProfile" >Edit Profile</button>

            </div>
        </div>

    </div>
    
    

    <!--
    <button type="button" id ="editProfile" >Edit Profile</button> 

    <div class = "container-status"></div>
    <label class="switch">
        <input type="checkbox" checked>
            <span class="slider"></span>
            <h4 id = "h4-status">Status</h4>
    </label>

    <div class="container-description">
        <i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at congue urna. Vivamus gravida congue velit, nec dapibus leo hendrerit vel. Mauris consectetur et ex ac rutrum. Maecenas interdum sagittis leo ac commodo. Vivamus velit augue, imperdiet eu laoreet a, mattis a lacus. Nam sagittis massa malesuada ante mattis maximus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus volutpat metus vitae ipsum blandit vulputate. Morbi auctor urna interdum, auctor eros vitae, tristique orci. Praesent pharetra urna tristique orci bibendum fermentum. Aenean faucibus justo ac ipsum aliquam convallis. Aenean ultricies eget libero et ultrices. Nullam auctor nisl ac magna interdum, et consectetur est blandit. Proin eu gravida purus. In quis efficitur nibh. Vestibulum congue euismod massa in tristique.</i>
    </div>

    <div class="container-ratings">
        <h3 id="h3-ratings">RATINGS</h3>
    </div>-->

    <script src="public/css/profile.js"></script>
</body>
</html>