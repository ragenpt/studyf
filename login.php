<?php
include 'base.php';
require_once 'includes/classes/FormSanitizer.php';
require_once 'includes/classes/Constants.php';
require_once 'includes/classes/UserAccounts.php';
//<!-- Auth -->
$account = new UserAccounts($connection);
if(isset($_POST['login'])){
    // Sanitization
    $username = FormSanitizer::username($_POST['username']);
    $password = FormSanitizer::confirmPassword($_POST['password']);
    // Validate Credentials
    $result = $account->login($username, $password);

    if($result[0]){
        $_SESSION['userLoggedIn'] = $username;
        $_SESSION['userIsTeacher'] = $result[1]['isTeacher'];
        if ($_SESSION['userIsTeacher']){
            header("Location: /soen_proj/about.php");
        } else{
            header("Location: /soen_proj/register.php");
        }
    }
}
function getInputValue($name){
    if (isset($_POST[$name])){
        echo $_POST[$name];
    }
}

startblock('main')
?>
    <div class="authHero">
        <div class="authContainer">
            <div class="authBox">
                <img src="assets/imgs/loginAvatar1.png" class="authAvatar" alt="Auth Avatar">
                <div>
                    <h1>Login Here</h1>
                </div>
                <div class="alertDiv">
                    <?php echo  $account->getError(Constants::$incorrectCredentials); ?>
                </div>
                <form action="" method="POST">
                    <div>
                        <p>Username</p>
                        <!-- The text field of the login box for the user's username. -->
                        <input type="text" name="username" value="<?php getInputValue('username'); ?>"
                               placeholder="Enter Username" required>
                        <p>Password</p>
                        <!-- The password field of the login box for the user's password. -->
                        <input type="password" name="password" placeholder="Enter Password" required>
                        <!-- Submit field of the login box for Logging in. -->
                        <input type="submit" name="login" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endblock() ?>