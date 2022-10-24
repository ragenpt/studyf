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
                <div class='navbar'>
                    <a href='about.php' class='<?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/about.php' ? 'active' : '')?>'>Grades.easy</a>
                    <a href='login.php' class='auth <?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/login.php' ? 'active' : '')?>'>Log In</a>
                    <a href='register.php' class='auth <?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/register.php' ? 'active' : '')?>'>Register</a>
                </div>
            <!--  NAV BAR END -->
        <?php else : ?>
        <!-- NAV BAR AUTHENTICATED AS TEACHER -->
        <div class="navbar">
            <a href="dashboard.php" class='<?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/dashboard.php' ? 'active' : '')?>'>Dashboard</a>
            <a href="about.php" class='<?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/about.php' ? 'active' : '')?>'>Grades.easy</a>
            <a href="account.php" class='auth <?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/account.php' ? 'active' : '')?>'>
                <?php echo $_SESSION['userLoggedIn'] ?></a>
            <a href="logout.php" class='auth'>Log Out</a>
        </div>
        <!--  NAV BAR END -->
        <!-- NAV BAR AUTHENTICATED AS TEACHER -->
            <!--    add nav bar    -->
        <!--  NAV BAR END -->
        <?php endif; ?>

        <?php startblock('main') ?>


                                            <!-- MAIN CONTENT -->


        <?php endblock() ?>



        <!-- FOOTER -->
        <div class="footer">
            <!-- <h5>footer</h5> -->
<!--        </div>-->
<!--         FOOTER END-->
    </body>
</html>