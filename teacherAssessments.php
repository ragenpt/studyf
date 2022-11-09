<?php
include 'partials/sideMenuTeacherDashboard.php';
include 'includes/classes/CourseAssessments.php';
include 'includes/classes/Constants.php';
//$existingCourses = new ExistingCourses($connection);
$assessmentsConnection = new CourseAssessments($connection);
if (isset($_POST['createNewAssessmentBtn'])){
    $assessmentName = FormSanitizer::sanitizeString($_POST['assessmentName']);
    $assessmentWeight = FormSanitizer::sanitizeString($_POST['assessmentWeight']);
    $assessmentQuestionCount = $_POST['assessmentQuestionCount'];
    $assessmentMarkCount = $_POST['assessmentMarkCount'];
    $result = $assessmentsConnection->addAssessment($currentCourseCode, $assessmentName, $assessmentWeight, $assessmentQuestionCount, $assessmentMarkCount);
    if($result){
        header("Location: /soen_proj/teacherAssessments.php?courseCode={$currentCourseCode}");
    }
}

$courseAssessments = $assessmentsConnection->getCourseAssessments($currentCourseCode);

function getInputValue($name){
    if (isset($_POST[$name])){
        echo $_POST[$name];
    }
}
startblock('dashboardMain');
?>
<!--        <div class="dashboard">         inherited from side menu partial    -->
<div class="assessmentsMain">
    <div class="listOfAllAssessments">
        <div class="title">
            <?php
                echo "<h1>Course Assessments For {$currentCourseTitle}</h1>";
            ?>
        </div>
        <?php
        if($courseAssessments){
            $i = 1;
            foreach($courseAssessments as $assessment){
                echo "<div class='singleAssessment'>";
                echo "<a href='/soen_proj/createAssessment.php?courseCode={$currentCourseCode}&assessmentId={$assessment['assessmentId']}'>
                        <span class='assessmentTitleSpan'>{$i}. {$assessment['assessmentName']}</span>
                        <span class='assessmentStats'>Number of Questions: {$assessment['questionCount']}</span>
                        <span class='assessmentStats'> | </span>
                        <span class='assessmentStats'>Marks: {$assessment['totalMarks']}</span>
                        <span class='assessmentStats'> | </span>
                        <span class='assessmentStats'> Weight: {$assessment['weight']}%</span></a>";
                echo "</div>";
                $i++;
            }
        }else{
            echo "<div class='singleAssessment'>";
            echo "<h4>You have not created any assessments for this course yet.</h4>";
            echo "</div>";
        }
        ?>
        <div class="addContentBtn" id="addQuestionSection" onclick="createNewAssessment();"></div>
    </div>
</div>
<!-- </div>      END OF div.dashboard      -->

<div id="newAssessmentModal" class="modal">
    <div class="modal-content">
        <span id="closeNewAssessmentModal" class="close">&times;</span>
        <div class="modalContainer">
            <div class="modalBox">
                <div>
                    <h1>Create New Assessment</h1>
                </div>
            <div class="alertDiv">
                <?php
                $error_1 = $assessmentsConnection->getError(Constants::$percentageOverflow);
                $error_2 = $assessmentsConnection->getError(Constants::$notEnoughMarks);
                if($error_1 || $error_2){
                    echo  $error_1;
                    echo  $error_2;
                    echo "<script>";
                    echo    "const modal = document.getElementById('newAssessmentModal');
                             modal.style.display = 'block';
                             const closeBtn = document.getElementById('closeNewAssessmentModal');
                             closeBtn.onclick = function() {
                             modal.style.display = 'none';}";
                    echo "</script>";
                }
                ?>
            </div>
                <form action="" method="POST">
                    <div>
                        <p>Name of the Assessment</p>
                        <input type="text" name='assessmentName' placeholder="Assessment Name"
                               value="<?php getInputValue('assessmentName'); ?>" required>
                        <p>Assessment Weight</p>
                        <input type="number" name='assessmentWeight' placeholder='Assessment Weight %'
                               value="<?php getInputValue('assessmentWeight'); ?>" required>
                        <p>Number of Questions</p>
                        <input type="number" name='assessmentQuestionCount'
                               value="<?php getInputValue('assessmentQuestionCount'); ?>" required>
                        <p>Total Mark Count</p>
                        <input type="number" name='assessmentMarkCount'
                               value="<?php getInputValue('assessmentMarkCount'); ?>" required>
                        <input type="submit" name="createNewAssessmentBtn" id="createNewAssessmentBtn"
                               value="Create New Assessment">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
endblock();
?>


