<?php
class FormSanitizer {
    public static function sanitizeString($inputStr){
        $inputStr = strip_tags($inputStr);
        $inputStr = trim($inputStr);
        $inputStr = strtolower($inputStr);
        return ucfirst($inputStr);
    }
    public static function username($inputStr){
        $inputStr = strip_tags($inputStr);
        return trim($inputStr);
    }

    public static function isTeacher($inputStr){
        return ($inputStr == "teacher") ? 1 : 0;
    }

    public static function confirmEmail($inputText){
        return strip_tags($inputText);
    }

    public static function confirmPassword($inputText){
        $inputText = strip_tags($inputText);
        return trim($inputText);
    }
}
