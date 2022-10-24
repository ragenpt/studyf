<?php
// for all teacher pages
// prevents non teachers accessing teacher page
function protectTeacherProperty(){
    if (!isset($_SESSION['userLoggedIn'])){
        header('Location: /soen_proj/register.php');
    } else {
        if (!$_SESSION['userIsTeacher']){
            header('Location: /soen_proj/studentDashboard.php');
        }
    }
}

// for all student pages
// prevents non student accessing student links
function protectStudentProperty(){
    if (!isset($_SESSION['userLoggedIn'])){
        header('Location: /soen_proj/register.php');
    } else {
        if ($_SESSION['userIsTeacher']){
            header('Location: /soen_proj/teacherDashboard.php');
        }
    }
}

// for register & login
// if user is authenticated block access to register & login
function redirectIfAuthenticated(){
    if (isset($_SESSION['userLoggedIn'])){
        if ($_SESSION['userIsTeacher']){

            header('Location: /soen_proj/teacherDashboard.php');
        } else{
            header('Location: /soen_proj/studentDashboard.php');
        }
    }
}
