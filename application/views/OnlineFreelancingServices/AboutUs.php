<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body>

<style>
    .AUheading {
        font-family: 'Poppins', sans-serif; 
        color: #1F4E70; 
        font-weight: bolder;
        font-size: 4rem;
    }
    .text-info {
        font-size: 2rem;
    }
    p{
        font-size: 1.7rem;
        font-family: 'Poppins', sans-serif;
    }
    .card {
        margin-top: 5%;
        margin-bottom: 5%;
        transition: all 0.2s ease;
        cursor: pointer
    }
    .card-text {
        text-align: center;
    }
    .card:hover {
    box-shadow: 5px 6px 6px 2px #e9ecef;
    transform: scale(1.1)
    }
    @media (min-width: 992px) {
        .AUheading {
            font-size: 6rem;
        }
    }
</style>

<div class="main text-center mt-5">
    <h1 class="AUheading">ABOUT US</h1>
    <p class="text-info">Developers' Objectives</p>
</div>
 
<div class="container-fluid p-0 m-0 align-items-center justify-content-center d-flex" style="min-height: 60vh;">
    <div class="row w-100 p-0 w-0">
        <div class="col-lg-3 col-md-6 mb-2">
            <div class="card  mx-auto" style="width:25rem;">
            <img src="<?php echo base_url();?>public/images/postjobexpertise.png" class ="mx-auto d-block" alt="" height="150" width="200">
                <div class="card-body">
                    <p class="card-text"><br> The developers of the project, Online Freelancing Platform, aim to create a platform where individuals can post their job expertise.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-2">
            <div class="card  mx-auto" style="width:25rem;">
            <img src="<?php echo base_url();?>public/images/indcontractor.jpg" class ="mx-auto d-block" alt="" height="150" width="250">
                <div class="card-body">
                    <p class="card-text"><br> This platform will serve as a form of service outsourcing for independent contractors.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-2">
            <div class="card  mx-auto" style="width:25rem;">
            <img src="<?php echo base_url();?>public/images/AUthirdpic.png" class ="mx-auto d-block" alt="" height="150" width="220">
                <div class="card-body">
                    <p class="card-text"><br> This project provides a link between freelancers from different fields and individuals looking for skilled workers. This website would make it easy for these people to interact.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-2">
            <div class="card  mx-auto" style="width:25rem;">
            <img src="<?php echo base_url();?>public/images/jobcategory.png" class ="mx-auto d-block" alt="" height="150" width="200">
                <div class="card-body">
                    <p class="card-text"><br> Online Freelancing Platform provides a wide range of categories, including blue-collar jobs and white-collar jobs. </p>
                </div>
            </div>
        </div>      
    </div>
</div>
    

</body>
</html>