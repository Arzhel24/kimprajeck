<?php

    require 'config/database.php';

    if(isset($_GET['ID']))
    {
        $ID = filter_var($_GET['ID'], FILTER_SANITIZE_NUMBER_INT);

        //FOR LATER
        $update_query = "UPDATE posts SET category_id=6 WHERE category_id=$ID";
        $update_result = mysqli_query($conn, $update_query);

        if(!mysqli_errno($conn)){
            $query = "DELETE FROM categories WHERE ID=$ID LIMIT 1";
            $result = mysqli_query($conn, $query);
            $_SESSION['delete-category-success'] = "Category deleted successfully.";
        }

    }
    header('Location: ' .ROOT_URL . 'admin/manage-categories.php');
    die();

?>