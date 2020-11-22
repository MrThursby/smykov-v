<?php

namespace App\Http\Controllers\Api\School;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\School\SchoolCourseRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SchoolCoursesController extends BaseController
{
    /**
     * @var SchoolCourseRepository
     */
    protected $schoolCourseRepository;

    /**
     * SchoolCoursesController constructor.
     */
    public function __construct()
    {
        $this->schoolCourseRepository = app(SchoolCourseRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        // Get courses list
        $courses = $this->schoolCourseRepository->getAllWithPaginate();
        // If categories list is empty, return error
        if($courses->count() == 0){
            return $this->responseError('Error. The list of courses is empty');
        }
        // If everything is ok, return category list
        return $this
            ->responseSuccess(
                $courses->toArray(),
                'Courses retrieved successfully'
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $course = $this->schoolCourseRepository->getById($id);
        if(!$course){
            return $this->responseError('Error. The course not found.');
        }
        return $this
            ->responseSuccess(
                $course->toArray(),
                'Course retrieved successfully'
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        //
    }
}
