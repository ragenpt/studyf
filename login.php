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
    $success = $account->login($username, $password);
    if($success){
        $_SESSION['userLoggedIn'] = $username;
        header("Location: /soen_proj/index.php");
    }
}
function getInputValue($name){
    if (isset($_POST[$name])){
        echo $_POST[$name];
    }
}
?>

<!-- Auth Ended -->
<?php startblock('main') ?>
        <div class="authContainer">
            <div class="logForm">
                <h3>Log In</h3>
                <div class="alertDiv">
                    <?php
                    echo  $account->getError(Constants::$incorrectCredentials);
                    ?>
                </div>
                <form action="" method='POST'>
                    <div class="username">
                        <label for="username"></label>
                        <input type="text" name='username' placeholder='Username'
                               value="<?php getInputValue('username');?>" required>
                    </div>
                    <div class="password">
                        <label for="password"></label>
                        <input type="password" name="password" placeholder='Password'
                               value="<?php getInputValue('password');?>" required>
                    </div>
                    <div class="authButton">
                        <input type="submit" name='login' value='Register'>
                    </div>
                </form>
            </div>
        </div>

<?php endblock() ?>