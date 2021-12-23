<header>
<?php 
if($this->session->userdata('UserLoginSession')){
?>
    <nav class="navbar custom-navbar navbar-expand-md navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="NewsFeed">
                    <img class="img-fluid" src="<?php echo base_url();?>public/images/logogif-unscreen.gif" alt="" width="120" 
                    class="d-inline-block align-text-top">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="nav justify-content-center collapse navbar-collapse" id="navbarCollapse">
                    <li class="nav-item">
                        <a href="NewsFeed" class="nav-item active nav-link">NewsFeed</a></li>
                    </li>
                    <li class="nav-item">
                        <a href="Profilepage" class="nav-item nav-link">Profile</a>
                    </li>
                </ul>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a href="Logout" class="nav-item nav-link">Logout</a>
                    </li>
                </ul>
            </div>
    </nav>
<?php
}else{
?>
    
    <nav class="navbar custom-navbar navbar-expand-md navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="Homepage">
                <img class="img-fluid" src="<?php echo base_url();?>public/images/logogif-unscreen.gif" alt="" width="120" class="d-inline-block align-text-top">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="nav justify-content-center collapse navbar-collapse" id="navbarCollapse">
                    <li class="nav-item">
                        <a href="Homepage" class="nav-item active nav-link">Home</a></li>
                    </li>
                    <li class="nav-item">
                        <a href="Aboutpage" class="nav-item nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="Contactpage" class="nav-item nav-link">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="FAQpage" class="nav-item nav-link">FAQ</a>
                    </li>
                </ul>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a href="Loginpage" class="nav-item nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="Registerpage" class="nav-item nav-link">SignUp</a>
                    </li>
                </ul>
            </div>
    </nav>
<?php };?>
   <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</header>
