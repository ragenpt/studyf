<?php
class Constants{
    // Auth errors
    public static $firstNameCharacters = "Your first name has to be between 2 and 50 characters.";
    public static $lastNameCharacters = "Your last name has to be between 2 and 50 characters.";
    public static $usernameCharacters = "Your username has to be between 2 and 50 characters.";
    public static $usernameTaken = "This username is taken.";
    public static $emailDoNotMatch = "Emails do not match.";
    public static $invalidEmail = "Invalid Email.";
    public static $emailAlreadyInUse = "Email already in use.";
    public static $passwordsDoNotMatch = "Passwords do not match.";
    public static $passwordLength = "Your passwords has to be between 5 and 255 characters.";
    public static $incorrectCredentials = "Your username or password was incorrect.";

    // Assessment errors
    public static $percentageOverflow = "With given weight of the assessment, total weight exceeds 100%, please decrease weight of the assessment.";
    public static $notEnoughMarks = "You cannot have more questions than marks.";
}
