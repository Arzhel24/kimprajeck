<?php
    
    require 'config/database.php';

    if(isset($_SESSION['user_id']))
    {
        $ID = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT avatar FROM users WHERE ID=$ID";
        $result = mysqli_query($conn, $query);
        $avatar = mysqli_fetch_assoc($result);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <link rel="stylesheet" href="<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="container nav_container">
            <a href="<?= ROOT_URL ?>" class="nav_logo">EXUSIAI</a>
            <ul class="nav_items">
                <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
                <li><a href="<?= ROOT_URL ?>services.php">Services</a></li>
                <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
                <?php if(isset($_SESSION['user_id'])) : ?>
                    <li class="nav_profile">
                        <div class="avatar">
                            <img src="<?= ROOT_URL . 'images/' .$avatar['avatar'] ?>" alt="">
                        </div>
                        <ul>
                            <li><a href="<?= ROOT_URL ?>admin/index.php">Dashboard</a></li>
                            <li><a href="<?= ROOT_URL ?>logout.php">Log Out</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li><a href="<?= ROOT_URL ?>signin.php">Sign In</a></li>
                <?php endif ?>
            </ul>

            <button id="open_nav-btn">☰</button>
            <button id="close_nav-btn">✖</i></button>
        </div>
    </nav>