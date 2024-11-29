<?php

    require 'config/database.php';

    if(isset($_POST['submit']))
    {
        $ID = filter_var($_POST['ID'], FILTER_SANITIZE_NUMBER_INT);
        $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
        $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
        $thumbnail = $_FILES['thumbnail'];

        $is_featured = $is_featured == 1 ?: 0;

        if(!$title){
            $_SESSION['edit-post'] = "Couldn't update post. Invalid title.";
        }
        else if(!$category_id){
            $_SESSION['edit-post'] = "Couldn't update post. Invalid category.";
        }
        else if(!$body){
            $_SESSION['edit-post'] = "Couldn't update post. Invalid body content.";
        }
        else{
            
            if($thumbnail['name']){
                $previous_thumbnail_path = '../images/' . $previous_thumbnail_name;
                if($previous_thumbnail_path)
                {
                    unlink($previous_thumbnail_path);
                }
            }

            $time = time();
            $thumbnail_name = $time . $thumbnail['name'];
            $thumbnail_tmp_name = $thumbnail['tmp_name'];
            $thumbnail_destination_path = '../images/' . $thumbnail_name;

            $allowed_files = ['png', 'jpg', 'jpeg'];
            $extension = explode('.', $thumbnail_name);
            $extension = end($extension);

            if(in_array($extension, $allowed_files))
            {
                if($thumbnail['size'] < 2000000)
                {
                    move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                }
                else{
                    $_SESSION['edit-post'] = "File size is too big. Upload less than 2MB.";
                }

            }
            else{
                $_SESSION['edit-post'] = "File should be png, jpg or jpeg.";
            }
        }


        if($_SESSION['edit-post'])
        {
            header('Location: ' .ROOT_URL . 'admin/');
            die();
        }
        else{
            if($is_featured == 1)
            {
                $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
                $zero_all_is_featured_result = mysqli_query($conn,$zero_all_is_featured_query);
            }

            $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;
            
            $update_query ="UPDATE posts SET title='$title', body='$body', thumbnail='$thumbnail_to_insert', category_id=$category_id, is_featured=$is_featured WHERE ID=$ID LIMIT 1";
            $update_result = mysqli_query($conn, $update_query);

            if(!mysqli_errno($conn))
            {
                $_SESSION['edit-post-success'] = "Post updated successfully.";
            }
        }
    }

    header('Location: '.ROOT_URL.'admin/');
    die();

?>