<?php

    require 'config/database.php';

    if(isset($_POST['submit']))
    {
        $author_id = $_SESSION['user_id'];
        $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
        $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
        $thumbnail = $_FILES['thumbnail'];

        $is_featured = $is_featured == 1 ?: 0;

        if(!$title)
        {
            $_SESSION['add-post'] = "Enter post title.";
        }
        else if(!$category_id)
        {
            $_SESSION['add-post'] = "Select post category.";
        }
        else if(!$body)
        {
            $_SESSION['add-post'] = "Enter post body.";
        }
        else if(!$thumbnail['name'])
        {
            $_SESSION['add-post'] = "Choose post thumbnail.";
        }
        else{
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
                    $_SESSION['add-post'] = "File size is too big. Upload less than 2MB.";
                }

            }
            else{
                $_SESSION['add-post'] = "File should be png, jpg or jpeg.";
            }
        }

        if(isset($_SESSION['add-post']))
        {
            $_SESSION['add-post-data'] = $_POST;
            header('Location: ' .ROOT_URL . 'admin/add-post.php');
            die();
        }
        else{
            if($is_featured == 1)
            {
                $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
                $zero_all_is_featured_result = mysqli_query($conn,$zero_all_is_featured_query);
            }
            
            $query ="INSERT INTO posts (title, body, thumbnail, category_id, author_id, is_featured) VALUES ('$title', '$body', '$thumbnail_name', $category_id, $author_id, $is_featured)";
            $result = mysqli_query($conn, $query);

            if(!mysqli_errno($conn))
            {
                $_SESSION['add-post-success'] = "New post added successfully.";
                header('Location: '.ROOT_URL.'admin/');
                die();
            }
        }

    }

    header('Location: '.ROOT_URL. 'admin/add-post.php');
    die();

?>