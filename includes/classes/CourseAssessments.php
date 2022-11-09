<?php
class CourseAssessments{
    private $conn;
    private $errorArr = array();

    public function __construct($connection){
        $this->conn = $connection;
    }

    public function addAssessment($courseCode, $assName, $assWeight, $assQCount, $assMarkCount){
        $courseId = $this->getCourseID($courseCode);
        $this->validateAssignmentWeight($assWeight, $courseId);
        $this->validateMarksToQuestions($assQCount, $assMarkCount);
        if (empty($this->errorArr)){
            return $this->createNewAssessment($courseId, $assName, $assWeight, $assQCount, $assMarkCount);
        }else{
            return false;
        }
    }

    private function createNewAssessment($courseId, $assName, $assWeight, $assQCount, $assMarkCount){
        $query = $this->conn->prepare("INSERT INTO
                                     CourseAssessments (courseId, assessmentName, weight, questionCount, totalMarks)
                                     VALUES (:courseId, :assName, :assWeight, :assQCount, :assMarkCount);");
        $query->bindValue(":courseId", $courseId);
        $query->bindValue(":assName", $assName);
        $query->bindValue(":assWeight", $assWeight);
        $query->bindValue(":assQCount", $assQCount);
        $query->bindValue(":assMarkCount", $assMarkCount);
        // debugging query
         $query->execute();
         var_dump($query->errorInfo());
         return false;
//        return $query->execute();
    }

    private function getCourseID($courseCode){
        $query = $this->conn->prepare("SELECT courseId FROM ExistingCourses WHERE courseCode=:courseCode;");
        $query->bindValue(":courseCode", $courseCode);
        $query->execute();
        $result = $query->fetch();
        return $result['courseId'];
    }
    private function validateMarksToQuestions($questionCount, $totalMarks){
        if ($totalMarks < $questionCount){
            array_push($this->errorArr, Constants::$notEnoughMarks);
        }
    }
    private function validateAssignmentWeight($assWeight, $courseId){
        $totalWeight = 0;
        if ($assWeight > 100){
            array_push($this->errorArr, Constants::$percentageOverflow);
            return;
        }
        $query = $this->conn->prepare("SELECT weight FROM CourseAssessments WHERE courseId=:courseId;");
        $query->bindValue(":courseId", $courseId);
        $query->execute();
        $result = $query->fetchAll();
        if ($query->rowCount() == 0){
            return;
        }else{
            foreach($result as $assessment){
                $totalWeight += $assessment['weight'];
            }
            $totalWeight += $assWeight;
            if ($totalWeight > 100){
                array_push($this->errorArr, Constants::$percentageOverflow);
            }
        }
    }
    public function getCourseAssessments($courseCode){
        $courseId = $this->getCourseID($courseCode);
        $query = $this->conn->prepare("SELECT * FROM CourseAssessments WHERE courseId=:courseId;");
        $query->bindValue(":courseId", $courseId);
        $query->execute();
        if($query->rowCount() != 0){
//            var_dump($query->fetch());
            return $query->fetchAll();
        }else{
            return false;
        }
    }

    public function getCourseAssessment($assessmentId){
        $query = $this->conn->prepare("SELECT * FROM CourseAssessments WHERE assessmentId=:assessmentId;");
        $query->bindValue(":assessmentId", $assessmentId);
        $query->execute();
//        var_dump($query->fetch());
        return $query->fetch();
    }

    public function getError($error){
        if(in_array($error, $this->errorArr)){
            return "<span class='errorMessage errorMessageModal'>$error</span><br>";
        }
        return false;
    }
}