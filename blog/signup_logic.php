<?php
    session_start();
    require 'config/database.php';

    if(isset($_POST['submit']))
    {
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $avatar = $_FILES['avatar'];

        if(!$firstname){
            $_SESSION['signup'] = "Please enter your first name.";
        }
        else if(!$lastname){
            $_SESSION['signup'] = "Please enter your last name.";
        }
        else if(!$username){
            $_SESSION['signup'] = "Please enter your username.";
        }
        else if(!$email){
            $_SESSION['signup'] = "Please enter a valid email.";
        }
        else if(strlen($createpassword) < 8 || strlen($confirmpassword) < 8)
        {
            $_SESSION['signup'] = "Password is too short. Enter a password not less than 8 characters.";
        }
        else if(!$avatar['name']){
            $_SESSION['signup'] = "Please add an avatar.";
        }
        else{
            if($createpassword !== $confirmpassword){
                $_SESSION['signup'] = "Passwords do not match.";
            }
            else{
                $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

                $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email ='$email'";
                $user_check_result = mysqli_query($conn, $user_check_query);
                if(mysqli_num_rows($user_check_result) > 0)
                {
                    $_SESSION['signup'] = "Username or Email already exists.";
                }
                else
                {
                    $time = time();
                    $avatar_name = $time . $avatar['name'];
                    $avatar_tmp_name = $avatar['tmp_name'];
                    $avatar_destination_path = 'images/' . $avatar_name;

                    $allowed_files = ['png', 'jpg', 'jpeg'];
                    $extension = explode('.', $avatar_name);
                    $extension = end($extension);

                    if(in_array($extension, $allowed_files))
                    {
                        if($avatar['size'] < 1000000)
                        {
                            move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                        }
                        else{
                            $_SESSION['signup'] = "File size is too big. Upload less than 1MB.";
                        }

                    }
                    else{
                        $_SESSION['signup'] = "File should be png, jpg or jpeg.";
                    }
                }
            }
        }

        if(isset($_SESSION['signup']))
        {
            $_SESSION['signup-data'] = $_POST;
            header('Location: ' .ROOT_URL. 'signup.php');
            die();
        }
        else{
            $insert_user_query = "INSERT INTO users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', password='$hashed_password', avatar='$avatar_name', is_admin=0";
            $insert_user_result = mysqli_query($conn, $insert_user_query);

            if(!mysqli_errno($conn))
            {
                $_SESSION['signup-success'] = "Registration successful. Please log in.";
                header('Location: ' .ROOT_URL. 'signin.php');
                die();
            }
        }

    }
    else
    {
        header('Location: ' .ROOT_URL. 'signup.php');
        die();
    }
?>