<?php
include_once 'includes/config.php';

// write assessment to data to file
$newCourseAssessment = trim(file_get_contents('php://input'));
$jsonString = json_decode($newCourseAssessment, JSON_PRETTY_PRINT);
if (gettype($jsonString) == 'array'){
    $assessmentId = $jsonString['assessmentId'];
    // Write to data file
    $filePath = "/Applications/XAMPP/xamppfiles/htdocs/soen_proj/data/assessment{$assessmentId}.json";
    $openedFile = fopen($filePath, 'w+');
//    if (!is_writable($openedFile)) { // Test if the file is writable
//        echo "Cannot write to {$openedFile}";
//        exit;
//    }
    fwrite($openedFile, $newCourseAssessment);
    fclose($openedFile);
}





//echo gettype($object);
//$courseTitle = $object['courseTitle'];
//$courseContent = $object['courseContent'];

//echo '<br>';
//echo $courseTitle, '<br>';
//echo $courseContent;
