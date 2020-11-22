<?php

namespace App\Http\Controllers\Api\School;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\School\SchoolLessonRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SchoolLessonsController extends BaseController
{
    /**
     * @var SchoolLessonRepository
     */
    protected $schoolLessonRepository;

    /**
     * SchoolLessonsController constructor.
     */
    public function __construct()
    {
        $this->schoolLessonRepository = app(SchoolLessonRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course_id, $secion_id)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
        $lesson = $this->schoolLessonRepository->getById($id);
        if(!$lesson){
            return $this->responseError('Error. The lesson not found.');
        }
        if(Auth()->user()->isAbleTo('school_lessons-read')){
            return $this->responseSuccess($lesson->toArray(), 'Lesson retrieved successfully');
        } else {
            return $this->responseError('Нет доступа', ['Lesson can\'t retrieved'], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
