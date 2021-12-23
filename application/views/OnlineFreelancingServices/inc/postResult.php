

<?php if(!empty($key_posts)){ foreach($key_posts as $p){?>
    <div class="bg-primary m-5 p-10 w-50 rounded">

        <div>
            <!--Display post here-->
            <!--Post example layout-->
            <div>
                <img src="">
                <div>
                <p>Description: <?php echo $p['requirements'] ?> </p>
                </div>
            </div>
        </div>

        ==========================================
        <!--PopUp Post Details onclick-->
        <div>
            <div>
                <!--Load skill needed-->
            </div>
            <div>
                Description~~
            </div>
            <div>
                <img src=""><br>
                <div>Ratings:
                    <!--Load starts rating-->
                    <img src="">
                </div>
                <button>Apply</button>
                <button>Report</button>
            </div><br>
            <div>
                <!--Load work images here-->
                <img src="">
            </div><br>
            <div>
                <p>Numbers of Workers: <?php echo $p['worker_count'] ?> </p>
            </div>

            <div>Expected Fee:</div>
            <div><p>Location: <?php echo $p['location'] ?> </p></div>
            <div><p><?php echo date("M j Y", $p['timestamp'])." ".date("h:iA", $p['timestamp']) ?> </p></div>
        </div>
    </div>

    <?php // id, requirements, worker count, location, date, time, name  ?>
    

<?php }} else { ?>
    <p>baka</p>
<?php } ?>