<?php 
require_once 'includes/config.php';
require_once 'includes/ti/ti.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>StudyForever</title>
        <link rel='stylesheet' type='text/css' href='assets/style/style.css'/>
        <link rel='stylesheet' type='text/css' href='assets/style/base.css'/>
    </head>
    <body>
        <?php if (!isset($_SESSION['userLoggedIn'])) : ?>
            <!-- NAV BAR NOT AUTHENTICATED -->
                <div id="navbar" class='navbar'>
                    <a href='about.php' class='<?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/about.php' ? 'active' : '')?>'>Grades.easy</a>
                    <a href='login.php' class='auth <?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/login.php' ? 'active' : '')?>'>Log In</a>
                    <a href='register.php' class='auth <?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/register.php' ? 'active' : '')?>'>Register</a>
                </div>
            <!--  NAV BAR END -->
        <?php elseif ($_SESSION['userIsTeacher']): ?>
        <!-- NAV BAR AUTHENTICATED AS TEACHER -->
        <div id="navbar" class="navbar">
            <a href="teacherDashboard.php" class='<?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/teacherDashboard.php' ? 'active' : '')?>'>Dashboard</a>
            <a href="about.php" class='<?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/about.php' ? 'active' : '')?>'>Grades.easy</a>
            <a href="account.php" class='auth <?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/account.php' ? 'active' : '')?>'>
                <?php echo $_SESSION['userLoggedIn'] ?></a>
            <a href="logout.php" class='auth'>Log Out</a>
        </div>
        <!--  NAV BAR END -->
        <?php else : ?>
        <!-- NAV BAR AUTHENTICATED AS STUDENT -->
        <div id="navbar" class="navbar">
            <a href="studentDashboard.php" class='<?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/studentDashboard.php' ? 'active' : '')?>'>Dashboard</a>
            <a href="explorePage.php" class='<?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/explorePage.php' ? 'active' : '')?>'>Explore</a>
            <a href="about.php" class='<?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/about.php' ? 'active' : '')?>'>Grades.easy</a>
            <a href="account.php" class='auth <?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/account.php' ? 'active' : '')?>'>
                <?php echo $_SESSION['userLoggedIn'] ?></a>
            <a href="logout.php" class='auth'>Log Out</a>
        </div>
        <!--    add nav bar    -->
        <!--  NAV BAR END -->
        <?php endif; ?>
        <div class="navbar-buffer"></div>
        <?php startblock('main') ?>


                                            <!-- MAIN CONTENT -->


        <?php endblock() ?>



        <!-- FOOTER -->
        <div class="footer">
        </div>
<!--         FOOTER END-->
        <script src="assets/js/main.js"></script>
        <script src="assets/js/assessments.js"></script>
    </body>
</html>