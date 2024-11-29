<?php
    require 'config/database.php';

    if(isset($_GET['ID']))
    {
        $ID = filter_var($_GET['ID'], FILTER_SANITIZE_NUMBER_INT);

        $query = "SELECT * FROM posts WHERE ID=$ID";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) == 1)
        {
            $post = mysqli_fetch_assoc($result);
            $thumbnail_name = $post['thumbnail'];
            $thumbnail_path = '../images/' . $thumbnail_name;

            if($thumbnail_path){
                unlink($thumbnail_path);
            }

            $delete_post_query = "DELETE FROM posts WHERE ID=$ID LIMIT 1";
            $delete_post_result = mysqli_query($conn, $delete_post_query);

            if(!mysqli_errno($conn))
            {
                $_SESSION['delete-post-success'] = "Post deleted successfully.";
            }

        }

    }
    header('Location: ' .ROOT_URL . 'admin/');
    die();
?>