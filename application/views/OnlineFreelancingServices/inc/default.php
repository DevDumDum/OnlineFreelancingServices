<body class="homepagebody">
    <div class="homepageContainer">
        <div class="hp-search-container"> 
            <h1 class="homepageH1">Find Something Near You</h1>
            <div class="homeFormbox">
                <select class="h-d-down" name="work" id="works">
                    <option value="null">Select</option>
                    <?php if(!empty($key_works)) { foreach($key_works as  $w){ ?>
                        <option value="<?php echo $w['ID'];?>"> <?php echo $w['profession_type'];?> </option>
                    <?php }} ?>
                </select>

                <input type="text" id="search-bar" name="location" placeholder="Search Location">
                    
                <button class="homeSearchIcon" id="home-search">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <h1 id="count-handler"></h1>
    </div>
     <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>

    function count_work(){
        $("#search-bar").text();
        $.get("<?=base_url('Work_controller/count_work_id')?>", {work_ID: $("#works").val()}, function(data){
            $("#count-handler").text("There are "+data+" job listings for "+$('#works option:selected').html());
        });
    }
    
    function count_work_loc(){
        $.get("<?=base_url('Work_controller/count_work_loc')?>", {location: $("#search-bar").val()}, function(data){
            $("#count-handler").text("There are "+data+" job listings at "+$('#search-bar').val()+".");
        });
    }

    $(document).ready(function(){
        // alert($("#works").val()); -- blank is null

        $("#works").change(function(){
            $("#search-bar").text("");
            if($("#works").val() > 0) count_work();
            else if($("#works").val() == 0){
                $("#count-handler").text("No searches");
            }
        });

        $("#home-search").click(function(){
            $("#works").val(0);
            if($("#search-bar").val()) count_work_loc();
        });


    });




</script>

</body>