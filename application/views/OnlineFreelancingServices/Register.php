<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body style= "background:linear-gradient(90deg,#1F4E70 50%, #E5E5E5 50%);">

    <form method="post" autocomplete="off" action="<?=base_url('index.php/Register_controller/adduser')?>"> 
            <div class="container" >

                <a href="Homepage">< BACK </a>
                <div class="row justify-content-evenly">

                    <div class="col-md-6">
                    <h1 class="display-3 fw-bolder text-center" style="color: #ffff">WELCOME</h1>

                        <div class="logo">
                            <img src="<?php echo base_url();?>public/images/logo.png" class ="mx-auto d-block" alt="" height="90"> <br>
                        </div>

                        <h2 class="text-center fs-4" style="color: #ffff">Create a New Account</h2>
                        <p class="fst-italic fs-5 text-center" style="color: #ffff">Already have an account? <span>Log in </span></p> <br>
                                                                                    <!---dito rin sa span ng Log in, add mo yung onclick para mag direct sa log in page-->
                        <div class="col-md-11 text-left">
                        <label for="first-name" class="" style="color: #ffff">First Name</label>
                        <input name="first-name" type="text" class="form-control" placeholder="Ex. Juan">

                        <br>

                        <label for="last-name" class="" style="color: #ffff">Last Name</label>
                        <input name="last-name" type="text" class="form-control" placeholder="Ex. DelaCruz">

                        <br>

                        <label for="middle-name" class="" style="color: #ffff">Middle Name</label>
                        <input name="middle-name" type="text" class="form-control" placeholder="Ex. Conje">

                        <br>

                        <label for="contact" class="" style="color: #ffff">Contact Number</label>
                        <input name="contact" type="number" class="form-control" placeholder="09xxxxxxxxx">

                        <br>
                        
                        <label for="email-address" class="" style="color: #ffff">Email Address</label>
                        <input name="email-address" type="email" class="form-control" placeholder="you@example.com">

                        <br>

                        <label for="password" class=""style="color: #ffff">Password</label>
                        <input name="password" type="password" class="form-control">

                        <br>

                        <label for="password" class=""style="color: #ffff">Confirm Password</label>
                        <input name="password" type="password" class="form-control">

                        <br>

                    <!--  <label for="id" class="">id</label>
                        <input type="button" value="Browse">-->
                    
                        
                        <label for="id" class="fst-italic" style="color: #ffff">KINDLY PROVIDE A PHOTO OF YOUR ID</label> <br>
                        <input type="button" value="Browse">

                    </div>                    
                </div> 
        <div class="col-md-6">
            <div class="row d-inline">
                <form>
                    <span>
                        <label for="day">Day:</label>
                        <select name="day" id="day"></select>
                    </span>
                    <span>
                        <label for="month">Month:</label>
                        <select name="month" id="month"></select>
                    </span>
                    <span>
                        <label for="year">Year:</label>
                        <select name="year" id="year"></select>
                    </span>
                </form>  <!--itong form tag consult kay ian kase baka need neto ng name kase attribute ma-record sa database-->

                <script src="<?php echo base_url();?>public/css/register.js"></script>
            </div>

            <br>

                <label for="prof" class=""><br>Profession</br></label>
                    <div>
                        <select name="Work">
                        <option value="null">Select</option>
                            <option value="Work1">Carpenter</option>
                            <option value="Work2">Accountant</option>
                            <option value="Work3">Architect</option>
                            <option value="Work4">Cashier</option>
                            <option value="Work5">Web Developer</option>
                            <option value="Work6">Cleaner</option>
                            <option value="Work7">Data Encoder</option>
                            <option value="Work8">Electrician</option>
                            <option value="Work9">Engineer</option>
                            <option value="Work10">Teacher</option>
                        </select>
                        <button name="addWorkPost">+</button>

                        <form action="register.php" method="get" name = "FormForOthers"> 
                        <label for="Others" class="" style="color:#000000">Other</label>
                        <input type="text" class="" placeholder="Ex. Lawyer">
                        <button name="addWorkPost">+</button>  <!--nag add po ako ng form IAN PA CHECK-->

                        </form>

                    </div>

                <label for="id" class=""><br>Type of ID</br></label>
                    <div>
                        <select name="id">
                            <option value="null">Select</option>
                            <option value="id1">Student ID</option>
                            <option value="id2">Driver's License</option>
                            <option value="id3">Philippine Passport</option>
                            <option value="id4">PhilHealth ID</option>
                            <option value="id5">UMID ID</option>
                            <option value="id6">Postal ID</option>
                            <option value="id7">Tin ID</option>
                            <option value="id8">Voter's ID</option>
                        </select>
                        <button name="addWorkPost">+</button>


                        <form action="register.php" method="get" name = "FormForOthers"> 
                        <label for="Others" class="" style="color:#000000">Other</label>
                        <input type="text" class="" placeholder="Ex. National ID"> <!--nag add po ako ng form IAN PA CHECK-->
                        <button name="addWorkPost">+</button>
                        </form>
                    </div>
                    <br> <br>
                    <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-primary btn-lg btn-block">REGISTER</button>
                    </div>          

            </div>    
            <br>                                          
        </div>
    </div>
</form>
    

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</div>
</html>