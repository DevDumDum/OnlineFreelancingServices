<?php 
if($this->session->userdata('UserLoginSession')){
    $udata = $this->session->userdata('UserLoginSession');
    if(!($udata['user_type']==='admin' || $udata['user_type']==='moderator')){
      redirect(base_url('AdminAuth/AdminLogout'));
    }
}else{
    redirect(base_url('AdminAuth/AdminLogin'));
}
?>
<header>
    <nav class="navbar custom-navbar navbar-expand-md navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="Dashboard">
                <img class="img-fluid" src="<?php echo base_url();?>public/images/logo.png" alt="" width="120" class="d-inline-block align-text-top">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="nav justify-content-end collapse navbar-collapse " id="navbarCollapse">
                    <li class="nav-item d-flex justify-content-left ">
                        <img class="img-fluid" src="<?php echo base_url();?>public/images/changepassword.png" alt="" width="13%">
                        <a href="#" class="nav-link-custom">Change Password</a>
                    </li>
                    <li class="nav-item d-flex justify-content-left">
                        <img class="img-fluid" src="<?php echo base_url();?>public/images/logout.png" alt="" width="17%">
                        <a href="AdminLogout" class="nav-link-custom">Log Out</a>
                    </li>
                </ul>
            </div>
    </nav>
</header>