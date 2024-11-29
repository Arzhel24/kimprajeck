<?php
    require 'config/database.php';

    if(isset($_GET['ID']))
    {
        $ID = filter_var($_GET['ID'], FILTER_SANITIZE_NUMBER_INT);

        $query = "SELECT * FROM users WHERE ID=$ID";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) == 1)
        {
            $avatar_name = $user['avatar'];
            $avatar_path = '../images/' . $avatar_name;

            if($avatar_path){
                unlink($avatar_path);
            }
        }

        //FOR LATER
        $thumbnails_query = "SELECT thumbnail FROM posts WHERE author_id=$ID";
        $thumbnails_result = mysqli_query($conn, $thumbnails_query);
        if(mysqli_num_rows($thumbnails_result) > 0){
            while($thumbnail = mysqli_fetch_assoc($thumbnails_result)){
                $thumbnail_path = '../images/' . $thumbnail['thumbnail'];

                if($thumbnail_path){
                    unlink($thumbnail_path);
                }
            }
        }


        $delete_user_query = "DELETE FROM users WHERE ID=$ID";
        $delete_user_result = mysqli_query($conn, $delete_user_query);
        
        if(mysqli_errno($conn))
        {
            $_SESSION['delete-user'] = "Couldn't delete {$user['firstname']} {$user['lastname']}.";
        }
        else{
            $_SESSION['delete-user-success'] = "{$user['firstname']} {$user['lastname']} deleted successfully.";
        }
    }
    header('Location: ' .ROOT_URL . 'admin/manage-users.php');
    die();
?>