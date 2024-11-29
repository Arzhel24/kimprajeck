<?php

    require 'config/database.php';

    if(isset($_POST['submit']))
    {
        $ID = filter_var($_POST['ID'], FILTER_SANITIZE_NUMBER_INT);
        $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(!$title || !$description){
            $_SESSION['edit-category'] = "Invalid form input on category page.";
        }
        else{
            $query = "UPDATE categories SET title='$title', description='$description' WHERE ID=$ID LIMIT 1";
            $result = mysqli_query($conn, $query);

            if(mysqli_errno($conn))
            {
                $_SESSION['edit-category'] = "Couldn't update category.";
            }
            else{
                $_SESSION['edit-category-success'] = "Category $title updated successfully.";
            }
        }
    }

    header('Location: ' .ROOT_URL. 'admin/manage-categories.php');
    die();

?>