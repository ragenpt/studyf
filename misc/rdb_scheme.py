class Users:
	userId:             int, PK
	firstName:          varchar
	lastName:           varchar
	username:           varchar
	email:              varchar, Unique
	password:           varchar
	signUpDate:         varchar, Datetime
	isTeacher:          bool

# Courses
class ExistingCourses:
	courseId:           int, PK
	userId:             int, ForeignKey (Users.userId)                      # if Users.isTeacher
	courseName:         varchar
	courseDesc:         text
	tags:               varchar
	courseCode:         varchar, Unique                                     # Self generated
	private:            bool


class CourseContents:
	contentId:          int, PK
	courseId:           int, ForeignKey (ExistingCourses.courseId)
	lectureName:        varchar
	lectureIndex:       int                                                 # unique per course (self incremented)
	isAssessment:       bool
	weight:             float, NULL                                         # if isAssessment


class CourseMaterial:
    if not CourseContents.isAssessment
    materialId:         int, PK
    contentId:          int, ForeignKey (CourseContent.contentId)
    videoLecture:       video


class AssessmentQuestions:
    if CourseContents.isAssessment
    questionId:         int, PK
    contentId:          int, ForeignKey (CourseContent.contentId)
    question:           text
    answer:             text
    totalMarks:         float


# STUDENTS
class EnrolledCourses:
	enrolledCourseId:   int, PK
	userId:             int, ForeignKey (Users.userId)				        # if not Users.isTeacher
	courseId		    int, ForeignKey (ExistingCourses.courseId)


class CourseProgress:
	progressId:         int, PK
	enrolledCourseId:     int, ForeignKey (EnrolledCourses.enrolledCourseId)
# 	userId:             int, ForeignKey (Users.userId)                      # if not Users.isTeacher
	contentId: 			int, ForeignKey (CourseContent.contentId)
	completion:         float                                               # % of video watched / completed assignment
    gradeReceived:      float, NULL                                         # if CourseContents.isAssessment


class AnsweredAssessmentQuestions:
	answeredQuestionId: int, PK
	enrolledCourseId:     int, ForeignKey (EnrolledCourses.enrolledCourseId)
# 	userId:             int, ForeignKey (Users.userId)	                    # if not Users.isTeacher
	questionId:         int, ForeignKey (AssessmentQuestions.questionId)
	answer:             text


class GradedAssessmentQuestions:
	gradedQuestionId:   int, PK
	enrolledCourseId:     int, ForeignKey (EnrolledCourses.enrolledCourseId)
# 	userId:             int, ForeignKey (Users.userId)	                    # if not Users.isTeacher
	questionId:         int, ForeignKey (AssessmentQuestions.questionId)
	marksReceived:      float
	notes:              text, NULL
