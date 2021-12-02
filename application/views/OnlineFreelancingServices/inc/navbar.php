<header>
<?php 
if($this->session->userdata('UserLoginSession')){
?>
    <nav>
        <img src="">
        <button onclick="window.location.href='NewsFeed';">
            NewsFeed
        </button>

        <a style="cursor:pointer;color:blue;" href="Profilepage">
            Profile
        </a>
        
        <button onclick="window.location.href='Logout';">
            Logout
        </button>
    </nav>    
<?php
}else{
?>
    =====================================================================
    <nav>
        <img src="">
        <button onclick="window.location.href='Homepage';">
            Home
        </button>
        <button onclick="window.location.href='Aboutpage';">
            About Us
        </button>
        <button onclick="window.location.href='Contactpage';">
            Contact Us
        </button>
        <button onclick="window.location.href='FAQpage';">
            FAQ
        </button>

        <button onclick="window.location.href='Loginpage';">
            Login
        </button>
        /
        <button onclick="window.location.href='Registerpage';">
            SignUp
        </button>
    </nav>
<?php };?>
    =====================================================================
</header>