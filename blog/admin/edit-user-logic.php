<?php
    require 'config/database.php';

    if(isset($_POST['submit']))
    {
        $ID = filter_var($_POST['ID'], FILTER_SANITIZE_NUMBER_INT);
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);

        if(!$firstname || !$lastname){
            $_SESSION['edit-user'] = "Invalid form input on edit page.";
        }
        else{
            $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', is_admin=$is_admin WHERE ID=$ID LIMIT 1";
            $result = mysqli_query($conn, $query);

            if(mysqli_errno($conn))
            {
                $_SESSION['edit-user'] = "Failed to update user.";
            }
            else{
                $_SESSION['edit-user-success'] = "User $firstname $lastname updated successfully.";
            }
        }
    }
    header('Location: '. ROOT_URL. 'admin/manage-users.php');
    die();
?>