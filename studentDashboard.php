<?php
include 'partials/base.php';
include_once 'partials/authCheck.php';

protectStudentProperty();
startblock('main');
?>
<div class="dashboard">
    <div class="side-menu">
        <div class="content">
            <div class="chosen-course">
                <h6>SOEN 287 Q 2222</h6>
                <div class="course">
                    <a href=""><span>Participants</span></a>
                </div>
                <div class="course">
                    <a href=""><span>Assessments</span></a>
                </div>
                <div class="course">
                    <a href=""><span>Grades</span></a>
                </div>
            </div>
            <div class="courses">
                <h6>My Courses</h6>
                <div class="course">
                    <a href=""><span>COMM 226 Q 2222</span></a>
                </div>
                <div class="course">
                    <a href=""><span>COMM 217 Q 2222</span></a>
                </div>
                <div class="course active">
                    <a  href=""><span>SOEN 287 Q 2222</span></a>
                </div>
                <div class="course">
                    <a href=""><span>COMM 220 Q 2222</span></a>
                </div>
                <div class="course">
                    <a href=""><span>COMP 248 Q 2222</span></a>
                </div>
                <div class="course">
                    <a href=""><span>Course 6</span></a>
                </div>
                <div class="course">
                    <a href=""><span>Course 7</span></a>
                </div>
                <div class="course">
                    <a href=""><span>Course 8</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-section">
        <div class="heading">
            <h1>SOEN 287 Q 2222</h1>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    &nbsp;/ My courses /&nbsp;
                </li>
                <li class="breadcrumb-item">
                    <a href="">SOEN-287-2222-Q</a>
                </li>
            </ul>
            <h2>Description</h2>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                has been the industry's standard du
                mmy text ever since the 1500s, when an unknown printer took a galley of t
                ype and scrambled it to make a type specimen book. It has survived no
                t only five centuries, but also the leap into electronic typesetting, remaining essentially
                unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions
                of Lorem Ipsum.
            </p>
        </div>
        <div class="course-content">
            <h1>SOEN 287 Q 2222 Content</h1>
            <div class="section">
                <h1>4 September - 10 September</h1>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                    has been the industry's standard du
                    mmy text ever since the 1500s,
                </p>
            </div>
            <div class="section">
                <h1>11 September - 17 September</h1>
            </div>
            <div class="section">
                <h1>18 September - 24 September</h1>
                <p>
                    Lorem Ipsum. It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                    Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions
                    of Lorem Ipsum.
                </p>
            </div>
            <div class="section">
                <h1>25 September - 1 October</h1>
            </div>
            <div class="section">
                <h1>2 October - 8 October</h1>
            </div>
            <div class="section">
                <h1>9 October - 15 October</h1>
                <p>
                    Lorem Ipsum. It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                    Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions
                    of Lorem Ipsum.
                </p>
            </div>
            <div class="section">
                <h1>16 October - 22 October</h1>
            </div>
            <div class="section">
                <h1>23 October - 29 October</h1>
            </div>
            <div class="section">
                <h1>30 October - 5 November</h1>
            </div>
        </div>
    </div>
</div>
<?php
endblock();
?>

