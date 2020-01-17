<?php

namespace Tests\Feature;

use App\Course;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function aCourse_isCreated_whenTheCorrectDetailsAreGiven(){
        //Arrange
        $data = [
            'name' => 'Information Technology',
            'course_code' => 'IT001'
        ];
        $expectedCourseCount = 1;
        //Act
        $this->post('/course', $data);
        //Assert
        $this->assertEquals($expectedCourseCount, count(Course::all()));
    }

    /**
     * @test
     */
    public function aCourse_returnsAnError_whenTheCourseNameAndCourseCodeIsNotGiven(){
        //$this->withoutExceptionHandling();
        //Arrange
        $data = [
            'name' => '',
            'course_code' => ''
        ];
        //Act
        $response = $this->post('/course', $data);
        //Assert
        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('course_code');
    }

    /**
     * @test
     */
    public function aCourse_returnsTheExpectedRedirectPath_whenTheCorrectDetailsAreGiven(){
        //Arrange
        $data = [
            'name' => 'Information Technology',
            'course_code' => 'IT001'
        ];
        $expectedRedirectPath = 'course.index';
        //Act
        $reponse = $this->post('/course', $data);
        //Assert
        $reponse->assertRedirect($expectedRedirectPath);
    }
}
