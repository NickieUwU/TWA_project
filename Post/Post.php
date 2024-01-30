<?php
    require("../DbHandler.php");
    Db::connect("localhost", "sin", "root", "");

    // Get a random user ID
    $Users = Db::queryAll("SELECT ID FROM users ORDER BY RAND() LIMIT 1");
    foreach($Users as $User)
    {
        $ID = $User["ID"];
    }

    // Get a random post from the user
    $Posts = Db::queryAll("SELECT * FROM posts WHERE ID=? ORDER BY RAND() LIMIT 1", $ID);
    foreach($Posts as $Post)
    {
        $Post_ID = $Post["Post_ID"];
        $Content = $Post["Content"];
        $Date = $Post["PostCreation"];
    }

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
    $IsLiked = "0";
    $Likes = Db::queryAll("SELECT * FROM likes WHERE ID=? AND Post_ID=?", $LoggedID, $Post_ID);
    foreach($Likes as $Like)
    {
        $IsLiked = $Like["Liked"];
    }
    $BtnText = "like";
    echo $IsLiked;
?>

<div class="post">
    <img src="../DefaultPFP/DefaultPFP.png" alt="Profile picture" class="PFP">
    <div class="post-info">
        <p class="name"><?php echo $Name; ?></p>
        <p class="handler"><?php echo $Username; ?></p>
        
    </div>
    <div class="date">
        <p class="date"><?php echo $Date; ?></p>
    </div>
    <textarea class="post-text" readonly><?php echo $Content; ?></textarea>
    <div class="actions" id="actionID">
        <div class="heart" id="heart">
        
        <form action="Home.php" method="post" id="likeForm">
            <button id="btnHeartID" class="btnHeart"><?php echo $BtnText; ?></button>
        </form>

        </div>
        <div class="comments">
           <a href="../ExpandedPost/ExpandedPost.php?Post=<?php echo $Post_ID?>">
                <i class="bi bi-chat-left-dots-fill"></i>
           </a> 
        </div>
    </div>
</div>
<script>
document.getElementById('likeForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var form = event.target;
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open(form.method, form.action, true);
    xhr.onload = function() {
        if (this.status == 200) {
            // Update the 'IsLiked' status and button text
            var btnHeart = document.getElementById('btnHeartID');
            btnHeart.value = this.responseText == '1' ? 'liked' : 'like';
            btnHeart.dataset.liked = this.responseText;
        }
    };
    xhr.send(formData);
});
</script>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        if($IsLiked == 0)
        {
            $IsLiked = 1;
            $data = array("ID" => $LoggedID, "Post_ID" => $Post_ID, "Liked" => $IsLiked);
            Db::insert("likes", $data);
            echo '1';
        }
        else
        {
            $IsLiked = 0;
            Db::query("DELETE FROM likes WHERE ID=? AND Post_ID=?", $LoggedID, $Post_ID);
            echo '0';
        }
        exit;
    }
?>