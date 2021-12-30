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
    <nav class="navbar custom-navbar-admin navbar-expand-md navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="Dashboard">
                <img class="img-fluid" src="<?php echo base_url();?>public/images/logogif-unscreen.gif" alt="" width="120" 
                class="d-inline-block align-text-top">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="nav justify-content-end collapse navbar-collapse " id="navbarCollapse">
                    <li class="nav-item d-flex justify-content-end">
                    <i class="fas fa-unlock-alt"></i>
                        <a href="#" class="nav-link-custom-admin" id = "changepass">ChangePassword </a>
                    </li>
                    <li class="nav-item d-flex justify-content-end">
                        <i class="fas fa-sign-out-alt"></i>
                        <a href="AdminLogout" class="nav-link-custom-admin" id = "logout">Logout</a>
                    </li>
                </ul>
            </div>
    </nav>
</header>