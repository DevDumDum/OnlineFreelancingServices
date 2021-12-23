

<?php if(!empty($key_posts)){ foreach($key_posts as $p){?>
    <div class="bg-primary m-5 p-10 w-50 rounded">

        <div>
            <!--Display post here-->
            <!--Post example layout-->
            <div>
                <img src="">
                <div>
                    <p><?php echo $p['post_owner']." needs ".$key_works[$p['profession_ID']-1]['profession_type']."<b>!</b>"; ?></p>
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
                    <p>Description: <?php echo $p['requirements'] ?> </p>
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

            <div>Expected Fee:
                <?php 
                    if(!empty($p['min_pay'])){ echo " &#8369 ".$p['min_pay']." up to ";}
                    echo "&#8369 ".$p['max_pay'];

                ?>
            </div>
            <div><p>Location: <?php echo $p['location'] ?> </p></div>
            <div><p><?php echo date("M j Y", $p['timestamp'])." ".date("h:iA", $p['timestamp']) ?> </p></div>
        </div>
    </div>

    <?php // id, requirements, worker count, location, date, time, name  ?>
    

<?php }} else { ?>
    <p>baka</p>
<?php } ?>