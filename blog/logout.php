<?php 

    require 'config/constants.php';
    session_destroy();
    header('Location: ' .ROOT_URL .'signin.php');
    die();

?>