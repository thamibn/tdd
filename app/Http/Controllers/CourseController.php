<?php

namespace App\Http\Controllers;

use App\Course;

use App\Repository\CourseRepository;

use Illuminate\Http\Request;

use App\Service\Validation\CourseValidation;

class CourseController extends Controller
{
    public function __construct(CourseRepository $courseRepository){
        $this->$courseRepository = $courseRepository;
    }

    public function store(Request $request){
        $data = CourseValidation::validateCourse($request);

        $this->courseRepository->createCourse($data['name'], $data['course_code']);

        return redirect('course.index');
    }
}
