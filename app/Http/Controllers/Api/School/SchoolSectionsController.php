<?php

namespace App\Http\Controllers\Api\School;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\School\Sections\SchoolSectionsCreateRequest;
use App\Http\Requests\Api\School\Sections\SchoolSectionsIndexRequest;
use App\Models\School\SchoolSection;
use App\Repositories\School\SchoolCourseRepository;
use App\Repositories\School\SchoolSectionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SchoolSectionsController extends BaseController
{
    /**
     * @var SchoolSectionRepository
     */
    protected $schoolSectionRepository;

    /**
     * @var SchoolSectionRepository
     */
    protected $schoolCourseRepository;

    /**
     * SchoolSectionsController constructor.
     */
    public function __construct()
    {
        $this->schoolSectionRepository = app(SchoolSectionRepository::class);
        $this->schoolCourseRepository = app(SchoolCourseRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SchoolSectionsIndexRequest $request
     * @return JsonResponse
     */
    public function index(SchoolSectionsIndexRequest $request)
    {
        $course_id = $request->input('course_id');

        if(Auth()->user()->isAbleTo('school_sections-read')){
            // Get all course's sections with lessons list
            $sections = $this->schoolSectionRepository->getAllByCourseIdWithLessons($course_id);
        } else {
            $course = $this->schoolCourseRepository->getById($course_id);
            if($course->purchasedBy(Auth()->id())){
                // Get allowed course's sections with lessons for auth user
                $sections = $this->schoolSectionRepository->getAllowedByCourseIdWithLessonsForUser($course_id, Auth()->id());
            } else {
                return $this->responseError('Ошибка, курс еще не куплен', ['Error. This course not purchased'], 200);
            }
        }
        //$sections = $this->schoolSectionRepository->getAllByCourseIdWithLessons($course_id);

        // If sections list is empty, return error
        if($sections->count() == 0){
            return $this->responseError('Error. The list of courses is empty');
        }

        // If everything is ok, return category list
        return $this
            ->responseSuccess(
                $sections->toArray(),
                'Sections retrieved successfully'
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SchoolSectionsCreateRequest  $request
     * @return JsonResponse
     */
    public function store(SchoolSectionsCreateRequest $request)
    {
        $section = new SchoolSection;

        $section->course_id = $request->input('course_id');
        $section->fork_id = $request->input('fork_id');
        $section->title = $request->input('title');

        // Save section
        if($section->save()){
            // If everything is ok, return category list
            return $this
                ->responseSuccess(
                    [],
                    'Sections save successfully'
                );
        } else {
            // Error if section don't save
            return $this->responseError('Error. Section don\'t save');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
