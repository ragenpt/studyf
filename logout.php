<?php
include_once 'includes/config.php';
//session_status();
session_destroy();
header("Location: /soen_proj/login.php");
