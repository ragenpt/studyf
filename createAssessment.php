<?php
include 'partials/base.php';
include_once 'partials/authCheck.php';
require_once 'includes/classes/FormSanitizer.php';
require_once 'includes/classes/CourseAssessments.php';
protectTeacherProperty();
$assessmentsConnection = new CourseAssessments($connection);
$assessmentId = $_GET['assessmentId'];
$courseAssessment = $assessmentsConnection->getCourseAssessment($assessmentId);
$filePath = "/Applications/XAMPP/xamppfiles/htdocs/soen_proj/data/assessment{$assessmentId}.json";
$openedFile = file_get_contents($filePath);
$arrayAssessmentData = json_decode($openedFile, true);
// assessment13.json
// prevent submit if it does not match number of question and marks are not distributed onsubmit
startblock('main');
?>
<div class="assessmentTemplate">
    <form id="writingAssessmentFormId" action="/soen_proj/teacherAssessments.php" method="POST" onsubmit="event.preventDefault(); validateAssessmentForm();">
        <div class="templateContent">
            <div class="totalMarks">
                <!-- To be fetched from db  -->
                <p>Total Marks: <span id="totalAllowedMarks"><?php echo $courseAssessment[5]; ?></span></p>
                <input type="hidden" id="numberOfQuestion" value="<?php echo$courseAssessment[4]; ?>">
            </div>
            <div class="templateHeader">
                <?php
                if (isset($arrayAssessmentData['assessmentTitle'])){
                    echo "<h1 class='assessmentTitle' id='assessmentTitle' contenteditable='true'>{$arrayAssessmentData['assessmentTitle']}</h1>";
                }else{
                    echo "<h1 class='assessmentTitle' id='assessmentTitle' contenteditable='true'>Enter the title of the Assessment</h1>";
                }
                ?>
            </div>
            <div class="templateBody">
                <div class='questionsContainer'>
                    <?php
                    if (isset($arrayAssessmentData['assessmentQuestions'])){
                        $questions = $arrayAssessmentData['assessmentQuestions'];
                        foreach($questions as $question){
                            echo "
                                 <div class='questionContainer'>
                                     <button class='deleteContentBtn' id='' onclick='deleteParentSection(this);'></button>
                                     <div class='questionHeader'>
                                         <div class='questionMarkInputDiv'>
                                             <label for='q{$question['questionNumber']}_marks'>Question {$question['questionNumber']} Marks: </label>
                                             <input type='number' id='q{$question['questionNumber']}_marks' class='questionMarkInput' min='1' value='{$question['questionMarks']}' onchange='checkTotalMarks(this);'>
                                         </div>
                                         <div class='questionInput'>
                                             <textarea name='q{$question['questionNumber']}' id='q{$question['questionNumber']}' placeholder='Enter the question...'>{$question['question']}</textarea>
                                         </div>
                                     </div>
                                     <div class='questionAnswers'>
                                     ";
                            $answerLetters = ['a', 'b', 'c', 'd', 'e', 'f'];
                            $i = 0;
                            foreach($question['answers'] as $answer){
                                $questionID = "q{$question['questionNumber']}a_{$answerLetters[$i]}";
                                if ($questionID == $question['correctAnswer']){
                                    echo "
                                             <div class='questionAnswer'>
                                                 <input type='radio' id='q{$question['questionNumber']}_{$answerLetters[$i]}' name='q{$question['questionNumber']}mcq' value='{$questionID}' checked>
                                                 <p id='{$questionID}' contenteditable='true'>{$answer['answer']}</p>
                                             </div>
                                         ";
                                }else{
                                    echo "
                                             <div class='questionAnswer'>
                                                 <input type='radio' id='q{$question['questionNumber']}_{$answerLetters[$i]}' name='q{$question['questionNumber']}mcq' value='{$questionID}' required>
                                                 <p id='{$questionID}' contenteditable='true'>{$answer['answer']}</p>
                                             </div>
                                         ";
                                }
                                $i++;
                            }
                            echo "
                                     </div>
                                 </div>
                                ";
                        }
                    }else{
                        echo "
                                  <div class='questionContainer'>
                                      <button class='deleteContentBtn' id='' onclick='deleteParentSection(this);'></button>
                                      <div class='questionHeader'>
                                          <div class='questionMarkInputDiv'>
                                              <label for='q1_marks'>Question 1 Marks: </label>
                                              <input type='number' id='q1_marks' class='questionMarkInput' min='1' onchange='checkTotalMarks(this);'>
                                          </div>
                                          <div class='questionInput'>
                                              <textarea name='q1' id='q1' placeholder='Enter the question...'></textarea>
                                          </div>
                                      </div>
                                      <div class='questionAnswers'>
                                          <div class='questionAnswer'>
                                              <input type='radio' id='q1_a' name='q1mcq' value='q1a_a' required>
                                              <p id='q1a_a' contenteditable='true'>Answer a...</p>
                                          </div>
                                          <div class='questionAnswer'>
                                              <input type='radio' id='q1_b' name='q1mcq' value='q1a_b' required>
                                              <p id='q1a_b' contenteditable='true'>Answer b...</p>
                                          </div>
                                          <div class='questionAnswer'>
                                              <input type='radio' id='q1_c' name='q1mcq' value='q1a_c' required>
                                              <p id='q1a_c' contenteditable='true'>Answer c...</p>
                                          </div>
                                          <div class='questionAnswer'>
                                              <input type='radio' id='q1_d' name='q1mcq' value='q1a_d' required>
                                              <p id='q1a_d' contenteditable='true'>Answer d...</p>
                                          </div>
                                      </div>
                                  </div>
                        ";
                    }
                    ?>
                </div>
                <div class="addNewQuestion">
                    <span class="tooltip">To add new question enter number of MC and press plus.</span>
                    <span class="tooltipError" id="tooltipError">This assignment can have only up to <?php echo $courseAssessment[4]?> questions.</span>
                    <input type="number" min="2" max="6" value="2" id="newQuestionMcqNumber">
                    <div class="addContentBtn" id="addQuestionSection" onclick="validateNumberOfQuestion();"></div>
                </div>
            </div>
            <div class="templateFooter">
                <div id="markDistributionError">
                    <p>Marks are not completely distributed. Please, finish mark distribution.</p>
                </div>
                <div id="questionCountError">
                    <p>You must have <?php echo $courseAssessment[4]?> questions in this assessment. Please add rest of them.</p>
                </div>
                <input type="submit" name="createNewAssessment" class="saveAssessmentBtn" value="Save Assessment">
            </div>
        </div>
    </form>
</div>
<?php
endblock();
?>
