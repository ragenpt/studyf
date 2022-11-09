<?php
class ExistingCourses{
    private $conn;
    private $errorArr = array();

    public function __construct($connection){
        $this->conn = $connection;
    }

    public function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    public function registerCourse($username, $courseName, $courseTags, $courseVisibility){
        $userId = $this->getUserID($username);
        $courseVisibility = ($courseVisibility == '0') ? 0 : 1; // public if '0' else private
        $courseCode = $this->generateCourseCode();
        $courseFile = "/Applications/XAMPP/xamppfiles/htdocs/soen_proj/data/{$courseCode}.json";
        return $this->createNewCourse($userId, $courseName, $courseTags, $courseCode, $courseVisibility, $courseFile);
    }

    private function getUserID($username){
        $query = $this->conn->prepare("SELECT userId FROM users WHERE username=:username;");
        $query->bindValue(":username", $username);
        $query->execute();
        $result = $query->fetch();
        return $result['userId'];
    }

    private function generateCourseCode(){
        $stringBank = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        shuffle($stringBank);
        $courseCode = join("", array_slice($stringBank, 0, 10));  // course code 10 literals
        if ($this->validateCourseCode($courseCode)){
            return $courseCode;
        } else {
            return $this->generateCourseCode();
        }
    }

    private function validateCourseCode($courseCode){
        $query = $this->conn->prepare("SELECT courseCode FROM ExistingCourses WHERE courseCode=:courseCode;");
        $query->bindValue(":courseCode", $courseCode);
        $query->execute();
        if($query->rowCount() == 0){
            return true;
        }
        return false;
    }

    private function createNewCourse($userId, $courseName, $courseTags, $courseCode, $courseVisibility, $courseFile){
        $query = $this->conn->prepare("INSERT INTO ExistingCourses 
                                            (userId, courseName, tags, courseCode, private, JSONFile)
                                            VALUES (:uID, :name, :tags, :code, :private, :json);");
          $query->bindValue(":uID", $userId);
          $query->bindValue(":name", $courseName);
          $query->bindValue(":tags", $courseTags);
          $query->bindValue(":code", $courseCode);
          $query->bindValue(":private", $courseVisibility);
          $query->bindValue(":json", $courseFile);
        //         Debugging query
//        $query->execute();
//        var_dump($query->errorInfo());
         return $query->execute();
    }

    public function getTeachersCourses($username){
        $userId = $this->getUserID($username);
        $query = $this->conn->prepare("SELECT * FROM ExistingCourses WHERE userId=:userId;");
        $query->bindValue(':userId', $userId);
        $query->execute();
        if($query->rowCount() != 0){
//            var_dump($query->fetch());
            return $query->fetchAll();
        } else {
            return false;
        }

    }
}
// create new json file if not exists (figure out permissions)
