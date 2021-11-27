<br><br><br>
<div>
    <!-- for applying category-->
    <!--Work:-->
    Type of Work:
    <select name="Work">
        <option value="null">----</option>
        <option value="Work1">Work1</option>
        <option value="Work2">Work2</option>
        <option value="Work3">Work3</option>
    </select><br><br>

    <!--Location:-->
    Location:<br>
    Province: <input type="text" name="province"><br>
    City: <input type="text" name="City"><br>
    <button name="category">Apply</button>
</div>
<br>
==========================================
<br>
<!--AddPost button-->
<button>Add Post</button><br>
==========================================
<!--PopUp createPost-->
<div>
    <form action="" method="post" enctype="multipart/form-data">
        Create Post<br>
        <div>
            <select name="Work">
                <option value="null">----</option>
                <option value="Work1">Work1</option>
                <option value="Work2">Work2</option>
                <option value="Work3">Work3</option>
            </select>
            <button name="addWorkPost">+</button>
        </div>
        <textarea name="description"></textarea><br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type="submit" value="submit" name="submit">
    </form>
</div>

<br>
==========================================
<br>
<div>
    <!--Display post here-->

    <!--Post example layout-->
    <div>
        <img src="">
        <div>
            Description~~
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
    <div>Numbers of Workers:</div>
    <div>Expected Fee:</div>
    <div>Location:</div>
</div>