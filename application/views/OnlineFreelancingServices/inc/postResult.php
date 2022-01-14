<?php
$udata = $this->session->userdata('UserLoginSession');

if(!empty($key_posts)) {

    if(!isset($offset)){
        $limit = 3;
        $offset = 0;
    }

    $feed = array();
    $feed[$offset] = $key_posts[$offset];

    for($i=$offset; $i<$offset+$limit; $i++){
        
    }

    foreach($feed as $p) {

        $id = $p['ID'];
        $name = $p['post_owner'];
        $p_title = "";

        if($p['profession_ID'] != 0) {
            $p_title = $name." needs ".$key_works[$p['profession_ID']-1]['profession_type']."<b>!</b>";
        } else {
            $p_title = $name." needs ".$key_works[0]['profession_type']."<b>!</b>";
        }
        echo "<div id='lala'>";
        echo'<script>';
        echo'
            var post_'.$id.' = document.createElement("div");
            post_'.$id.'.id = "post_'.$id.'";
            post_'.$id.'.className = "main_post";
            post_'.$id.'.style.height ="400px";
            post_'.$id.'.style.width ="400px";
            post_'.$id.'.style.marginBottom ="50px";
            post_'.$id.'.style.backgroundColor ="lightblue";
            document.getElementById("result").appendChild(post_'.$id.');

            var post_titlebar_'.$id.' = document.createElement("div");
            post_titlebar_'.$id.'.id = "post_titlebar_'.$id.'";
            post_titlebar_'.$id.'.style.height ="100px";
            post_titlebar_'.$id.'.style.width ="100%";
            post_titlebar_'.$id.'.style.backgroundColor ="grey";
            document.getElementById("post_'.$id.'").appendChild(post_titlebar_'.$id.');

            var user_image'.$id.' = document.createElement("div");
            user_image'.$id.'.id = "user_image'.$id.'";
            user_image'.$id.'.className = "userImage";
            user_image'.$id.'.style.height ="50px";
            user_image'.$id.'.style.width ="50px";
            user_image'.$id.'.style.backgroundColor ="red";
            document.getElementById("post_titlebar_'.$id.'").appendChild(user_image'.$id.');

            var name_'.$id.' = document.createElement("p");
            name_'.$id.'.id = "name_'.$id.'";
            name_'.$id.'.innerHTML = "'.$p_title.'";
            document.getElementById("post_titlebar_'.$id.'").appendChild(name_'.$id.');
        ';

        if($udata['id'] == $p['poster_ID']) {
            echo '
                var option_'.$id.' = document.createElement("input");
                option_'.$id.'.id = "option_'.$id.'";
                option_'.$id.'.setAttribute("type", "button");
                option_'.$id.'.setAttribute("value", "option");
                option_'.$id.'.style.float = "right";
                option_'.$id.'.addEventListener ("click", function() {
                    document.getElementById("edit_p").value='.$id.';
                    document.getElementById("del_p").value='.$id.';
                    document.getElementById("PostOptionMenu").style.display="block";
                    
                });
                document.getElementById("post_titlebar_'.$id.'").appendChild(option_'.$id.');
            ';
        }else{
            echo '
                var apply_'.$id.' = document.createElement("input");
                apply_'.$id.'.id = "apply_'.$id.'";
                apply_'.$id.'.setAttribute("type", "button");
                apply_'.$id.'.setAttribute("value", "Apply");
                apply_'.$id.'.style.float = "right";
                apply_'.$id.'.addEventListener ("click", function() {
                    alert('.$id.');
                });
                document.getElementById("post_'.$id.'").appendChild(apply_'.$id.');
            ';
        }

        echo '</script>';
        echo "</div>";
    }
}
?>
<script>
    var offset = <?php if(isset($offset)) echo $offset ?>; 
    var scrollLimit = Math.max( document.body.scrollHeight, document.body.offsetHeight, 
                   document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
    
    /*
    window.addEventListener('scroll',(event) => {
        var current = window.scrollY;

        if(current + window.innerHeight === limit) {

            add_post();
            alert("max");            
        }
    });
    */

    function add_post(){
        offset++;
        console.log(offset);
    }

    $(function(){
        
        $.ajaxSetup ({ cache: false });
        
        $(window).scroll(function(){
            
            var current = window.scrollY;
            if(current + window.innerHeight == scrollLimit) {

                add_post();
                alert("max");
                
                <?php
                    echo '<script>';
                    $temp = 'offset';
                    echo 'tempVar = '.$key_posts[$temp].';';
                    echo '</script>';
                ?>
                alert(tempVar);

                $(<?php echo $feed[$temp] ?>).load(tempVar);
            }

        });

    });
</script>
