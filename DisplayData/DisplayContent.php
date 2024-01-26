<?php
    Db::connect("localhost", "sin", "root", "");
    $get_id = Db::query("SELECT ID FROM users WHERE Username=?", $_SESSION["username"]);
    if ($get_id !== false) 
    {
        // Fetch posts for the user
        $posts = Db::queryAll("SELECT * FROM posts WHERE ID=?", $get_id);
    
        if ($posts) 
        {
            foreach ($posts as $post) 
            {
                $Content = $post['Content'];
                echo $Content;
            }
        }
    }
?>