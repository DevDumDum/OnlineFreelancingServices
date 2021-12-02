<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body>
    <div class="container">
        <a href="Homepage">< BACK </a>
        <div class="row justify-content-evenly">
            <div class="col-md-6">
            <h1 class="display-3 fw-bold text-center">WELCOME</h1>
                <div class="logo">
                    <img src="<?php echo base_url();?>public/images/logo.png" alt="" width="100" height="60">
                </div>
                <h2 class="text-center">Create a New Account</h2>
                <p class="fst-italic fs-5 text-center">Already have an account? <span>Log in </span></p>
                <form action="register.php" method="get">
                    <div class="form-group">
                        <label for="first-name" class="">First Name</label>
                        <input type="text" class="form-control" placeholder="Ex. Maku">

                        <br>

                        <label for="last-name " class="">Last Name</label>
                        <input type="text" class="form-control" placeholder="Ex. Aren">

                        <br>

                        <label for="middle-name " class="">Middle Name</label>
                        <input type="text" class="form-control" placeholder="Ex. V.">

                        <br>

                        <label for="contact" class="">Contact Number</label>
                        <input type="number" class="form-control" placeholder="09xxxxxxxxx">

                        <br>
                        
                        <label for="email-address" class="">Email Address</label>
                        <input type="email" class="form-control" placeholder="you@example.com">

                        <br>

                        <label for="password" class="">Password</label>
                        <input type="password" class="form-control">

                        <br>

                        <label for="password" class="">Confirm Password</label>
                        <input type="password" class="form-control">

                        <br>

                    <!--  <label for="id" class="">id</label>
                        <input type="button" value="Browse">-->
                    

                        <label for="id" class="">kindly provide a photo of your id</label>
                        <input type="button" value="Browse">

                    </div>
                </form>
            </div>
      
        <div class="col-md-6">
            <div class="row d-inline">
                <div class="col-md-4">
                    <label for="bday" class=""><br>Birthdate</br></label>
                        <select class="form-control" name="day_select">
                            <?php
                            printf('<option value="null">Date</option>');
                            for ($i =0; $i<=31; ++$i){
                                $time=strtotime(sprintf('+%d days', $i));
                                $day_value=date('d', $time);
                                $days=date('d', $time);
                                printf('<option value="%s">%s</option>', $day_value, $days);
                            }
                            ?>
                        </select>
                        <select class="form-control" name="month_select">
                            <?php
                            printf('<option value="null">Month</option>');
                            for ($i =0; $i<=12; ++$i){
                                $time=strtotime(sprintf('--%d months', $i));
                                $monthValue=date('m', $time);
                                $monthName=date('F', $time);
                                printf('<option value="%s">%s</option>', $monthValue, $monthName);
                            }
                            ?>
                        </select>
                        <select class="form-control" name="year_select">
                            <?php $y=(int)date("Y");?>
                            <option value="<?php printf('<option value="null">Year</option>');
                            echo $y; ?>" selected ="true"><?php echo $y; ?></option>
                            <?php $y--;
                            for (; $y>"1895"; $y--){ ?>
                                <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                            <?php } ?>
                        </select>
                </div>

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
            <input type="submit" name ="create" value="Register">

        </div>
    </div>
    

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>