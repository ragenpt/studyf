<?php 
require_once 'includes/config.php';
require_once 'ti/ti.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>StudyForever</title>
        <link rel='stylesheet' type='text/css' href='assets/style/style.css'/>
        <link rel='stylesheet' type='text/css' href='assets/style/base.css'/>
    </head>
    <body>
        <!-- NAV BAR -->
        <div class="navbar">
            <a href="index.php" class='<?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/index.php' ? 'active' : '')?>'>StudyForever</a>
            <a href="login.php" class='auth <?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/login.php' ? 'active' : '')?>'>Log In</a>
            <a href="register.php" class='auth <?php echo ($_SERVER['PHP_SELF'] == '/soen_proj/register.php' ? 'active' : '')?>'>Register</a>
        </div>
        <!-- NAV BAR ------ END -->


        <?php startblock('main') ?>


                                            <!-- MAIN CONTENT -->


        <?php endblock() ?>



        <!-- FOOTER -->
        <div class="footer">
            <!-- <h5>footer</h5> -->
        </div>
        <!-- FOOTER END -->
    </body>
</html>