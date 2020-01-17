<?php
namespace App\Service\Validation;

use Illuminate\Http\Request;

Class CourseValidation
{
    public static function validateCourse(Request $request){
        return $request->validate([
            'name' => 'required',
            'course_code' => 'required'
        ]);
    }
}