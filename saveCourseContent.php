<?php
include_once 'includes/config.php';
//ini_set('display_errors', 1); // show errors
//error_reporting(-1); // of all levels
//date_default_timezone_set('UTC'); // PHP will complain about on this error level

// write new data to file
$newCourseData = trim(file_get_contents('php://input'));
$jsonString = json_decode($newCourseData, JSON_PRETTY_PRINT);
if (gettype($jsonString) == 'array'){
    $courseCode = $jsonString['courseCode'];
    // Write to data file
    $filePath = "/Applications/XAMPP/xamppfiles/htdocs/soen_proj/data/{$courseCode}.json";
    $openedFile = fopen($filePath, 'w+');
//    if (!is_writable($openedFile)) { // Test if the file is writable
//        echo "Cannot write to {$openedFile}";
//        exit;
//    }
    fwrite($openedFile, $newCourseData);
    fclose($openedFile);
}





//echo gettype($object);
//$courseTitle = $object['courseTitle'];
//$courseContent = $object['courseContent'];

//echo '<br>';
//echo $courseTitle, '<br>';
//echo $courseContent;
