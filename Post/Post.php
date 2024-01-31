<?php
    require("../DbHandler.php");
    Db::connect("localhost", "sin", "root", "");

    // Get a random user ID


    // Get a random post from the user
    $Posts = Db::queryAll("SELECT * FROM posts ORDER BY RAND() LIMIT 1");
    foreach($Posts as $Post)
    {
        $Post_ID = $Post["Post_ID"];
        $ID = $Post["ID"];
        $Content = $Post["Content"];
        $Date = $Post["PostCreation"];
    }

    $Users = Db::queryAll("SELECT * FROM users WHERE ID=?", $ID);

    $Users = Db::queryAll("SELECT * FROM users WHERE ID=?", $ID);
    foreach($Users as $User)
    {
        $Name = $User["Name"];
        $Username = $User["Username"];
    }

    $_LoggedUser = Db::queryAll("SELECT * FROM users WHERE Username=?", $_SESSION["username"]);
    foreach($_LoggedUser as $LoggedUser)
    {
        $LoggedID = $LoggedUser["ID"];
    }
    $Likes = Db::queryAll("SELECT * FROM likes WHERE ID=? AND Post_ID=?", $LoggedID, $Post_ID);
    if($Likes)
    {
        foreach($Likes as $Like)
        {
            $IsLiked = $Like["Liked"];
        } 
    }
    else
    {
        $IsLiked = "0";
    }
    
    $BtnText;
?>
<form action="Home.php" method="post" id="likeForm">
    <!-- Pass the Post_ID in a hidden input field -->
    <input type="hidden" name="Post_ID" value="<?php echo $Post_ID; ?>">

    <div class="post">
        <img src="../DefaultPFP/DefaultPFP.png" alt="Profile picture" class="PFP">
        <div class="post-info">
            <p class="name"><?php echo $Name; ?></p>
            <p class="handler" name="PostUsername"><?php echo $Username; ?></p>
            
        </div>
        <div class="date">
            <p class="date"><?php echo $Date; ?></p>
        </div>
        <textarea class="post-text" name="PostContent" readonly><?php echo $Content; ?></textarea>
        <div class="actions" id="actionID">
            <div class="heart" id="heart">
                <?php
                    if($IsLiked == 0)
                    {
                        $BtnText = "like";
                    }
                    else if($IsLiked == 1)
                    {
                        $BtnText = "liked";
                    }
                ?>
            
            
                <button id="btnHeartID" class="btnHeart"><?php echo $BtnText; ?></button>
        

            </div>
            <div class="comments">
            <a href="../ExpandedPost/ExpandedPost.php?Post=<?php echo $Post_ID?>">
                    <i class="bi bi-chat-left-dots-fill"></i>
            </a> 
            </div>
        </div>
    </div> 
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $Post_ID = $_POST["Post_ID"];

        if($IsLiked == 0)
        {
            $IsLiked = 1;
            $data = array("ID" => $LoggedID, "Post_ID" => $Post_ID, "Liked" => $IsLiked);
            Db::insert("likes", $data);
        }
        else if($IsLiked == 1)
        {
            Db::query("DELETE FROM likes WHERE ID=? AND Post_ID=? AND Liked=?", $LoggedID, $Post_ID, $IsLiked);
            $IsLiked = 0;
        }

        // Fetch the like status again after the update
        $Likes = Db::queryAll("SELECT * FROM likes WHERE ID=? AND Post_ID=?", $LoggedID, $Post_ID);
        $IsLiked = count($Likes) > 0 ? $Likes[0]["Liked"] : 0;
    }
?>
<script>
document.getElementById('likeForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var form = event.target;
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open(form.method, form.action, true);
    xhr.onload = function() {
        if (this.status == 200) 
        {
            var btnHeart = document.getElementById("btnHeartID");
            btnHeart.innerText = (btnHeart.innerText === "like") ? "liked" : "like";
        }
    };
    xhr.send(formData);
});
</script>