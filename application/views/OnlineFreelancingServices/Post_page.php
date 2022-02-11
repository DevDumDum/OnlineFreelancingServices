<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php 
if(!(isset($_GET['p_id']))) {
    redirect(base_url('Loginpage'));
}
?>

<body id="newsfeed">
    <div class="container-newsfeed">
        <div class="row custom-row-container" style="margin-right: 0;">
            <div class="col-8 newsfeed-side">
                <div id="result">
                    <?php if(isset($_GET['admin'])) { ?>
                        <img src="<?= base_url() ?>uploads/users/<?php echo $_GET["p_id"];?>/valid_id.jpg" id="photoProfile">
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <br>
</body>

<?php if(!(isset($_GET['admin']))) {?>
    <script>
        var scrollLimit ,limit, offset;
        $(document).ready(function(){
            display_new_post();
        })

        function display_new_post(){
            const theFunction = "<?=base_url('Post_controller/get_a_post'); ?>";
            $.post(theFunction, {id : <?php echo $_GET['p_id'];?>}, function(data, status){
                if(status=='success'){
                    const myArray = JSON.parse(data);
                    var postArray = [];
                    postArray["name"] = myArray[0];
                    postArray["work"] = myArray[1];
                    postArray["id"] = myArray[2];
                    postArray["name_id"] = myArray[3];
                    
                    postArray['requirements'] = myArray[4];
                    postArray['worker_count'] = myArray[5];
                    postArray['applicants'] = myArray[6];
                    postArray['accepted'] = myArray[7];

                    postArray['location'] = myArray[8];
                    postArray['min_pay'] = myArray[9];
                    postArray['max_pay'] = myArray[10];
                    postArray['timestamp'] = myArray[11];
                    initPost(postArray);

                    // BIGGER DIV BETTER DIV; BIGGER BETTER
                    scrollLimit = Math.max($(document).height(), $(window).height());
                }
            })
        }

        function initPost(postArray){
            var name = postArray["name"];
            var work = postArray["work"];
            var curID = postArray["id"];
            var owner = postArray["name_id"];
            var req = postArray['requirements'];
            var w_count = postArray['worker_count'];
            var a_count = postArray['applicants'];
            var accepted_count = postArray['accepted'];

            var loc = postArray['location'];
            var min_p = postArray['min_pay'];
            var max_p = postArray['max_pay'];
            var date = postArray['timestamp'];

            /*
            console.log(
                "Name: "+name+
                "\nWork: "+work+
                "\nPost ID: "+curID+
                "\nName ID: "+owner+
                "\nReq: "+req+
                "\nWorkers #: "+w_count+
                "\nApplicants #: "+a_count+
                "\nAccepted #: "+accepted_count+
                "\nLocation: "+loc+
                "\nMinimum Pay: "+min_p+
                "\nMaximum Pay: "+max_p+
                "\nDate: "+date
            );
            */
            let post = [];

            post["post_"+curID] = document.createElement("div");
            post["post_"+curID].id = "post_"+curID;
            post["post_"+curID].className = "main_post";
            document.getElementById("result").appendChild(post["post_"+curID]);


            post["post_titlebar_"+curID] = document.createElement("div");
            post["post_titlebar_"+curID].id = "post_titlebar"+curID;
            post["post_titlebar_"+curID].className = "post_titlebar";
            document.getElementById(post["post_"+curID].id).appendChild(post["post_titlebar_"+curID]);

            post["user_image_"+curID] = document.createElement("div");
            post["user_image_"+curID].id = "user_image"+curID;
            post["user_image_"+curID].className = "userImage";
            document.getElementById(post["post_titlebar_"+curID].id).appendChild(post["user_image_"+curID]);

            post["name_"+curID] = document.createElement("p");
            post["name_"+curID].id = "name_"+curID;
            post["name_"+curID].innerHTML = name+" needs " + work;
            document.getElementById(post["post_titlebar_"+curID].id).appendChild(post["name_"+curID]);

            post["container_"+curID] = document.createElement("div");
            post["container_"+curID].id = "container_"+curID;
            post["container_"+curID].className = "post-description-container";
            post["container_"+curID].innerHTML += 
            "Req: "+req+
            "<br>Workers #: "+w_count+
            "<br>Applicants #: "+a_count+
            "<br>Accepted #: "+accepted_count+
            "<br>Location: "+loc+
            "<br>Minimum Pay: "+min_p+
            "<br>Maximum Pay: "+max_p+
            "<br>Date: "+date+"<br><br>";
            document.getElementById(post["post_"+curID].id).appendChild(post["container_"+curID]);
        }
    </script>
<?php }?>