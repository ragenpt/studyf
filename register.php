<?php
include 'base.php';
require_once 'includes/classes/FormSanitizer.php';
require_once 'includes/classes/Constants.php';
require_once 'includes/classes/UserAccounts.php';

$account = new UserAccounts($connection);

if(isset($_POST['submitRegistration'])){
    // Sanitization
    $firstName = FormSanitizer::sanitizeString($_POST['firstName']);
    $lastName = FormSanitizer::sanitizeString($_POST['lastName']);
    $username = FormSanitizer::username($_POST['username']);
    $userType = FormSanitizer::isTeacher($_POST['userType']);
    $email1 = FormSanitizer::confirmEmail($_POST['email1']);
    $email2 = FormSanitizer::confirmEmail($_POST['email2']);
    $password1 = FormSanitizer::confirmPassword($_POST['password1']);
    $password2 = FormSanitizer::confirmPassword($_POST['password2']);
    // Validate Registration
    $success = $account->register($firstName, $lastName, $username, $userType, $email1, $email2, $password1, $password2);
    if($success){
        header("Location: /soen_proj/login.php");
    }
}
function getInputValue($name){
    if (isset($_POST[$name])){
        echo $_POST[$name];
    }
}
// Main Content
startblock('main') ?>
<div class="authHero">
    <div class="authContainer">
        <div class="authBox">
            <img src="assets/imgs/loginAvatar1.png" class="authAvatar" alt="Auth Avatar">
            <div>
                <h1>Register Here</h1>
            </div>
            <div class="alertDiv">
                    <?php
                        echo $account->getError(Constants::$firstNameCharacters);
                        echo $account->getError(Constants::$lastNameCharacters);
                        echo $account->getError(Constants::$usernameCharacters);
                        echo $account->getError(Constants::$usernameTaken);
                        echo $account->getError(Constants::$emailDoNotMatch);
                        echo $account->getError(Constants::$invalidEmail);
                        echo $account->getError(Constants::$emailAlreadyInUse);
                        echo $account->getError(Constants::$passwordsDoNotMatch);
                        echo $account->getError(Constants::$passwordLength);
                    ?>
            </div>
            <form action="" method="POST">
                <p>Choose a profile</p>
                <select name="userType" id="userType" required>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
                <div>
                    <p>First Name </p>
                    <input type="text" name='firstName' placeholder="First Name"
                           value="<?php getInputValue('firstName');?>" required>
                    <p>Last Name</p>
                    <input type="text" name='lastName' placeholder='Last Name'
                           value="<?php getInputValue('lastName');?>" required>
                    <p>Username</p>
                    <input type="text" name='username' placeholder='Username'
                           value="<?php getInputValue('username');?>" required>
                    <p>Email:</p>
                    <input type="email" name='email1' placeholder='E-mail'
                           value="<?php getInputValue('email1');?>" required>
                    <input type="email" name='email2' placeholder='Confirm E-mail'
                           value="<?php getInputValue('email2');?>" required>
                    <p>Password</p>
                    <input type="password" name='password1' placeholder='Password' required>
                    <input type="password" name='password2'  placeholder='Confirm Password' required>
                    <input type="submit" name="submitRegistration" value="Register">
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Of Main-->
<?php endblock() ?>
