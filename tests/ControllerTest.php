<?php namespace Tests;
use \logstore_expander\service as moodle_service;
use \logstore_expander\controller as moodle_controller;

class ControllerTest extends TestCase {
    /**
     * Sets up the tests.
     * @override TestCase
     */
    public function setup() {
        $this->controller = new moodle_controller(new moodle_service(new TestRepository((object) [], $this->cfg)));
    }

    /**
     * Tests the create_event method of the moodle_controller.
     */
    public function testCreateEvent() {
        $test_data = [];
        $event = $this->controller->create_event($test_data);
        $this->assertEquals(null, $event);
    }

    /**
     * Tests the create_event method of the moodle_controller with the course_viewed event.
     */
    public function testReadCourseViewedEvent() {
        $test_data = $this->constructCourseViewed();
        $event = $this->controller->create_event($test_data);
        $this->assertCourseViewed($test_data, $event);
    }

    /**
     * Tests the create_event method of the moodle_controller with the page_viewed event.
     */
    public function testReadPageViewedEvent() {
        $test_data = $this->constructPageViewed();
        $event = $this->controller->create_event($test_data);
        $this->assertModuleViewed($test_data, $event, 'page');
    }

    /**
     * Tests the create_event method of the moodle_controller with the quiz_viewed event.
     */
    public function testReadQuizViewedEvent() {
        $test_data = $this->constructQuizViewed();
        $event = $this->controller->create_event($test_data);
        $this->assertModuleViewed($test_data, $event, 'quiz');
    }

    /**
     * Tests the create_event method of the moodle_controller with the url_viewed event.
     */
    public function testReadUrlViewedEvent() {
        $test_data = $this->constructUrlViewed();
        $event = $this->controller->create_event($test_data);
        $this->assertModuleViewed($test_data, $event, 'url');
    }

    /**
     * Tests the create_event method of the moodle_controller with the folder_viewed event.
     */
    public function testReadFolderViewedEvent() {
        $test_data = $this->constructFolderViewed();
        $event = $this->controller->create_event($test_data);
        $this->assertModuleViewed($test_data, $event, 'folder');
    }

    /**
     * Tests the create_event method of the moodle_controller with the book_viewed event.
     */
    public function testReadBookViewedEvent() {
        $test_data = $this->constructBookViewed();
        $event = $this->controller->create_event($test_data);
        $this->assertModuleViewed($test_data, $event, 'book');
    }

    /**
     * Tests the create_event method of the moodle_controller with the attempt_started event.
     */
    public function testReadAttemptStartedEvent() {
        $test_data = $this->constructAttemptStarted();
        $event = $this->controller->create_event($test_data);
        $this->assertAttemptStarted($test_data, $event);
    }

    /**
     * Tests the create_event method of the moodle_controller with the attempt_reviewed event.
     */
    public function testReadAttemptReviewedEvent() {
        $test_data = $this->constructAttemptReviewed();
        $event = $this->controller->create_event($test_data);
        $this->assertAttemptStarted($test_data, $event);
    }

    /**
     * Tests the create_event method of the moodle_controller with the user_loggedin event.
     */
    public function testReadUserLoggedinEvent() {
        $test_data = $this->constructUserLoggedin();
        $event = $this->controller->create_event($test_data);
        $this->assertUserLoggedin($test_data, $event);
    }

    /**
     * Tests the create_event method of the moodle_controller with the user_loggedout event.
     */
    public function testReadUserLoggedoutEvent() {
        $test_data = $this->constructUserLoggedout();
        $event = $this->controller->create_event($test_data);
        $this->assertUserLoggedout($test_data, $event);
    }

    /**
     * Tests the create_event method of the moodle_controller with the assignment_graded event.
     */
    public function testReadAssignmentGradedEvent() {
        $test_data = $this->constructAssignmentGraded();
        $event = $this->controller->create_event($test_data);
        $this->assertAssignmentGraded($test_data, $event);
    }

    /**
     * Tests the create_event method of the moodle_controller with the assignment_submitted event.
     */
    public function testReadAssignmentSubmittedEvent() {
        $test_data = $this->constructAssignmentSubmitted();
        $event = $this->controller->create_event($test_data);
        $this->assertAssignmentSubmitted($test_data, $event);
    }    
}
