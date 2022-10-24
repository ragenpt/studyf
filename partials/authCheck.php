<?php
if (!isset($_SESSION['userLoggedIn'])){
    header('Location: /soen_proj/register.php');
}