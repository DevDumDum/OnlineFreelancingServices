<?php
$udata = $this->session->userdata('UserLoginSession');
            
if(!empty($key_posts)){
    foreach($key_posts as $p) {
        /*
        $id = $p['ID'];
        $name_id = $p['poster_ID'];
        $name = ($p['post_owner'] == '')? strval($p['post_owner']): "Anonymous";
        */

        $post = array();
        $post['id'] = $p['ID'];
        $post['name_id'] = $p['poster_ID'];
        $post['name'] = ($p['post_owner'] == '')
            ? strval($p['post_owner'])
            : "Anonymous";
        $post['work'] = ($p['profession_ID'] != 0) 
            ? $post['work'] = $key_works[$p['profession_ID']-1]['profession_type']
            : $post['work'] = $key_works[0]['profession_type'];

        echo'<script>'; 
        echo 'initPost('.json_encode($post).');';
        echo '</script>';
    }
}
?>

<script>    
    //var offset = <?php if(isset($offset)) return $offset; else return 0  ?>; 
    var scrollLimit = Math.max( document.body.scrollHeight, document.body.offsetHeight, 
        document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
    
    function add_post(){
        alert();
        offset++;
        console.log(offset);
    }
    function initPost(postArray){

        alert();
                var name = postArray["name"];
                var work = postArray["work"];
                var curID = postArray["id"];
                var owner = postArray["name_id"];

                let post = [];
        
                //var post_ = document.createElement("div");
                post["post_"+curID] = document.createElement("div");
                post["post_"+curID].id = "post_"+curID;
                post["post_"+curID].className = "main_post";
                post["post_"+curID].style.height ="400px";
                post["post_"+curID].style.width ="400px";
                post["post_"+curID].style.marginBottom ="50px";
                post["post_"+curID].style.backgroundColor ="lightblue";
                document.getElementById("result").appendChild(post["post_"+id]);
        
                //var post_titlebar_".$id." = document.createElement("div");
                post["post_titlebar_"+curID] = document.createElement("div");
                post["post_titlebar_"+curID].id = "post_titlebar_"+curID;
                post["post_titlebar_"+curID].style.height ="100px";
                post["post_titlebar_"+curID].style.width ="100%";
                post["post_titlebar_"+curID].style.backgroundColor ="grey";
                document.getElementById(post["post_"+curID]).appendChild(post["post_titlebar_"+curID]);
        
                //var user_image".$id." = document.createElement("div");
                post["user_image_"+curID] = document.createElement("div");
                post["user_image_"+curID].id = "user_image"+curID;
                post["user_image_"+curID].className = "userImage";
                post["user_image_"+curID].style.height ="50px";
                post["user_image_"+curID].style.width ="50px";
                post["user_image_"+curID].style.backgroundColor ="red";
                document.getElementById(post["post_titlebar_"+curID]).appendChild(post["user_image_"+curID]);
        
                post["name_"+curID] = document.createElement("p");
                post["name_"+curID].id = "name_"+curID;
                post["name_"+curID].id.innerHTML = name+" needs " + work;
                document.getElementById("post_titlebar_"+curID+"").appendChild(post["name_"+curID]);
                
                if( <?php echo $udata["id"];  ?> == owner) {
                    
                    post["option_"+curID] = document.createElement("input");
                    // var option_ = document.createElement("input");
                    post["option_"+curID].id = "option_"+curID;
                    post["option_"+curID].setAttribute("type", "button");
                    post["option_"+curID].setAttribute("value", "option");
                    post["option_"+curID].style.float = "right";
                    post["option_"+curID].addEventListener ("click", function() {
                        document.getElementById("edit_p").value=curID;
                        document.getElementById("del_p").value=curID;
                        document.getElementById("PostOptionMenu").style.display="block";
                    });
                    document.getElementById("post_titlebar_"+curID).appendChild(post["option_"+curID]);
                    
                }else {
                    post["apply_"+curID] = document.createElement("input"); 
                    //var apply_ = document.createElement("input");
                    post["apply_"+curID].id = "apply_"+curID;
                    post["apply_"+curID].setAttribute("type", "button");
                    post["apply_"+curID].setAttribute("value", "Apply");
                    post["apply_"+curID].style.float = "right";
                    post["apply_"+curID].addEventListener ("click", function() {
                        alert(curID);
                    });
                    document.getElementById(post["post_"+curID]).appendChild(post["apply_"+curID]);
                }
            }
    
    function display_post(){
        console.log('1');
        alert();
        //var lala= {};

        //lala['my_'+id] = '12321';
        //alert(my_1); 
    }

    $(function(){
        
        $.ajaxSetup ({ cache: false });
        
        $(window).scroll(function(){
            
            var current = window.scrollY;
            if(current + window.innerHeight == scrollLimit) {
                <?php   ?>
            }
        });

        $(window).load(function(){

        })

        $(document).ready(function(){
            alert();
        })

    });

    function  initPost(inputID, owner){
        var curID = inputID.toString();
        var post[];

        //var post_'.$id.' = document.createElement("div");
        post['post_'+curID] = document.createElement("div");
        post['post_'+curID].id = "post_"+curID;
        post['post_'+curID].className = "main_post";
        post['post_'+curID].style.height ="400px";
        post['post_'+curID].style.width ="400px";
        post['post_'+curID].style.marginBottom ="50px";
        post['post_'+curID].style.backgroundColor ="lightblue";
        document.getElementById("result").appendChild(post['post_'+id]);

        //var post_titlebar_'.$id.' = document.createElement("div");
        post['post_titlebar_'+curID] = document.createElement("div");
        post['post_titlebar_'+curID].id = 'post_titlebar_'+curID;
        post['post_titlebar_'+curID].style.height ="100px";
        post['post_titlebar_'+curID].style.width ="100%";
        post['post_titlebar_'+curID].style.backgroundColor ="grey";
        document.getElementById(post['post_'+curID]).appendChild(post['post_titlebar_'+curID]);

        //var user_image'.$id.' = document.createElement("div");
        post['user_image_'+curID] = document.createElement("div");
        post['user_image_'+curID].id = "user_image'.$id.'";
        post['user_image_'+curID].className = "userImage";
        post['user_image_'+curID].style.height ="50px";
        post['user_image_'+curID].style.width ="50px";
        post['user_image_'+curID].style.backgroundColor ="red";
        document.getElementById("post['post_titlebar_'+curID]").appendChild(user_image'.$id.');

        var name_'.$id.' = document.createElement("p");
        name_'.$id.'.id = "name_'.$id.'";
        name_'.$id.'.innerHTML = "'.$p_title.'";
        document.getElementById("post_titlebar_'.$id.'").appendChild(name_'.$id.');
        

        if(<?php echo $udata['id'] ?> == owner) {
            
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
            
        }else{
            var apply_'.$id.' = document.createElement("input");
            apply_'.$id.'.id = "apply_'.$id.'";
            apply_'.$id.'.setAttribute("type", "button");
            apply_'.$id.'.setAttribute("value", "Apply");
            apply_'.$id.'.style.float = "right";
            apply_'.$id.'.addEventListener ("click", function() {
                alert('.$id.');
            });
            document.getElementById("post_'.$id.'").appendChild(apply_'.$id.');
        }
    }
</script>
