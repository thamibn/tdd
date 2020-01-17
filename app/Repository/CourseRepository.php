<?php

namespace App\Repository;

class CourseRepository implements IRepository
{
    protected $course;

    public function __construct(Course $course){
        $this->course = $course;
    }

    public function all(){
        return $this->course->all();
    }
    
    public function createCourse($name, $courseCode){
        $this->course->name = $name;
        $this->course->course_code = $courseCode;
        
        return $this->course->save();
    }
    public function delete($id){
       $this->course->delete();

    }
}