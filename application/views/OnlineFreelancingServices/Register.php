<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body>
    <form method="post" autocomplete="off" action="<?=base_url('index.php/Register_controller/adduser')?>"> 
            <div class="container">

                <a href="Homepage">< BACK </a>
                <div class="row justify-content-evenly">

                    <div class="col-md-6">
                        <h1 class="display-3 fw-bold text-center">WELCOME</h1>

                        <div class="logo">
                            <img src="<?php echo base_url();?>public/images/logo.png" class ="mx-auto d-block" alt="" height="90">
                        </div>

                        <h2 class="text-center">Create a New Account</h2>
                        <p class="fst-italic fs-5 text-center">Already have an account? <span>Log in </span></p>
                                                                                    <!---dito rin sa span ng Log in, add mo yung onclick para mag direct sa log in page-->
                        <div class="form-group">
                        <label for="first-name" class="">First Name</label>
                        <input name="first-name" type="text" class="form-control" placeholder="Ex. Maku">

                        <br>

                        <label for="last-name" class="">Last Name</label>
                        <input name="last-name" type="text" class="form-control" placeholder="Ex. Aren">

                        <br>

                        <label for="middle-name" class="">Middle Name</label>
                        <input name="middle-name" type="text" class="form-control" placeholder="Ex. V.">

                        <br>

                        <label for="contact" class="">Contact Number</label>
                        <input name="contact" type="number" class="form-control" placeholder="09xxxxxxxxx">

                        <br>
                        
                        <label for="email-address" class="">Email Address</label>
                        <input name="email-address" type="email" class="form-control" placeholder="you@example.com">

                        <br>

                        <label for="password" class="">Password</label>
                        <input name="password" type="password" class="form-control">

                        <br>

                        <label for="password" class="">Confirm Password</label>
                        <input name="password" type="password" class="form-control">

                        <br>

                    <!--  <label for="id" class="">id</label>
                        <input type="button" value="Browse">-->
                    

                        <label for="id" class="">kindly provide a photo of your id</label>
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
                            <option value="Work1">Work1</option>
                            <option value="Work2">Work2</option>
                            <option value="Work3">Work3</option>
                        </select>
                        <button name="addWorkPost">+</button>
                    </div>

                <label for="id" class=""><br>Type of ID</br></label>
                    <div>
                        <select name="id">
                            <option value="null">Select</option>
                            <option value="id1">Student ID</option>
                            <option value="id2">Driver's License</option>
                            <option value="id3">Philhealth ID</option>
                        </select>
                        <button name="addWorkPost">+</button>
                    </div>

            </div>    


            <br>
            <input type="submit" class = "submit" name ="create" value="Register" >
                                                            <!--- add mo here yung onclick eme para mag direct siya sa sa login page-->
        </div>
    </div>
</form>
    

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>