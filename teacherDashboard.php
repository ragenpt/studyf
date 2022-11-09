<?php
include 'partials/sideMenuTeacherDashboard.php';
//$existingCourses = new ExistingCourses($connection);

startblock('dashboardMain');
?>
<!--        <div class="dashboard">         inherited from side menu partial    -->
<div class="main-section">
    <?php if (!isset($_GET['courseCode'])): ?>
        <div class="emptyHeading">
            <h1 id='courseTitle'>Select the course you would like to edit</h1>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    &nbsp;/ My courses /&nbsp;
                </li>
            </ul>
        </div>
    <?php else : ?>
        <div class="heading">
            <?php
                echo "<input type='hidden' value='{$currentCourseCode}' id='courseCodeInput'>";
                echo "<h1 id='courseTitle'>{$currentCourseTitle}</h1>";
            ?>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/soen_proj/teacherDashboard.php">Home</a>
                </li>
                <li class="breadcrumb-item">
                    &nbsp;/ My courses /&nbsp;
                </li>
                <li class="breadcrumb-item">
                    <?php
                    echo "<a href='/soen_proj/teacherDashboard.php?courseCode={$currentCourseCode}'>{$currentCourseTitle}</a>"
                    ?>
                </li>
            </ul>
            <h2>Description</h2>
            <?php
            if (isset($arrayCourseData['courseDesc'])){
                echo "<div class='custom-textarea' id='courseDescription' onkeyup='writeCourseContent()' contenteditable=''>", $arrayCourseData['courseDesc'], "</div>";
            } else{
                echo "<div class='custom-textarea' id='courseDescription' onkeyup='writeCourseContent()' contenteditable=''>Course Description...</div>";
            }
            ?>
        </div>
        <div class="course-content">
            <?php
            if (isset($arrayCourseData['courseContent'])){
                $sectionContent = $arrayCourseData['courseContent'];
                $i = 0;
                foreach ($sectionContent as $section){
                    echo "<div class='section' id='contentSection{$i}'>";
                    echo "<button class='deleteContentBtn' id='' onclick='deleteParentSection(this);'></button>";
                    if (isset($section['sectionTitle'])){
                        echo "<input type='text' onfocusout='writeCourseContent()' placeholder='Section Title...'  value='{$section['sectionTitle']}' class='titleInput' id='titleInputID{$i}'>";
                    } else{
                        echo "<input type='text' onfocusout='writeCourseContent()' placeholder='Section Title...' class='titleInput' id='titleInputID{$i}'>";
                    }
                    if (isset($section['sectionText'])){
                        echo "<div class='custom-textarea' id='textInputID{$i}' onfocusout='writeCourseContent()' contenteditable>{$section['sectionText']}</div>";
                    } else{
                        echo "<div class='custom-textarea' id='textInputID{$i}' onfocusout='writeCourseContent()' contenteditable>Section text...</div>";
                    }
                    echo "<div class='sectionLinksArea' id='sectionLinkArea{$i}'>";
                    echo "<div class='sectionLink'>";
                    if (isset($section['sectionLinkHT']) && isset($section['sectionLinkURL'])){
                        echo "<input type='text' placeholder='Link Text..' value='{$section['sectionLinkHT']}' class='linkInput' id='linkInputHT{$i}' onfocusout='writeCourseContent();'>";
                        echo "<input type='url' placeholder='https://example.com' value='{$section['sectionLinkURL']}' class='linkInput' id='linkInputURL{$i}' onfocusout='writeCourseContent();'>";
                    } else{
                        echo "<input type='text' placeholder='Link Text..' class='linkInput' id='linkInputHT{$i}' onfocusout='writeCourseContent();'>";
                        echo "<input type='url' placeholder='https://example.com' class='linkInput' id='linkInputURL{$i}' onfocusout='writeCourseContent();'>";
                    }
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='sectionFileArea'>";
                    echo "<label for='fileInputID{$i}' class='custom-file-upload'>Upload File</label>";
                    echo "<input type='file' id='fileInputID{$i}' name='' onchange='displaySelectedFileName(this);' multiple/>";
                    echo "</div>";
                    echo "</div>";
                    $i++;
                }
            } else{
                echo "<div class='section' id='contentSection0'>
                            <button class='deleteContentBtn' id='' onclick='deleteParentSection(this);'></button>
                            <input type='text' placeholder='Section 1' class='titleInput' id='titleInputID0' onfocusout='writeCourseContent()'>
                            <div class='custom-textarea' id='textInputID0' onfocusout='writeCourseContent()' contenteditable=''>Section text...</div>
                            <div class='sectionLinksArea' id='sectionLinkArea0'>
                                <div class='sectionLink'>
                                    <input type='text' placeholder='Link Text..' class='linkInput' id='linkInputHT0' onfocusout='writeCourseContent();'>
                                    <input type='url' placeholder='https://example.com' class='linkInput' id='linkInputURL0' onfocusout='writeCourseContent();'>
                                </div>
                            </div>   
                            <div class='sectionFileArea'>   
                                <label for='fileInputID0' class='custom-file-upload'>Upload File</label>
                                <input type='file' id='fileInputID0' name='' onchange='displaySelectedFileName(this);' multiple/>
                            </div>
                      </div>";
            }
            ?>
        </div>
        <button class="addContentBtn" id="addContentSection" onclick="addContentSection();"></button>
    <?php endif;?>
</div>
<!--                </div>      END OF div.dashboard      -->
<?php
endblock();
?>


