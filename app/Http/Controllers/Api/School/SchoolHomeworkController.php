<?php

namespace App\Http\Controllers\Api\School;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\School\Homework\SchoolHomeworkIndexRequest;
use App\Repositories\School\SchoolHomeworkRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SchoolHomeworkController extends BaseController
{
    /**
     * @var SchoolHomeworkRepository
     */
    protected $schoolHomeworkRepository;

    /**
     * SchoolHomeworkController constructor.
     */
    public function __construct()
    {
        $this->schoolHomeworkRepository = app(SchoolHomeworkRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @param SchoolHomeworkIndexRequest $request
     * @return JsonResponse
     */
    public function index(SchoolHomeworkIndexRequest $request)
    {
        $lesson_id = $request->input('lesson_id');
        // Get courses list
        $sections = $this->schoolHomeworkRepository->getAllByLessonIdWithChecks($lesson_id, auth()->id());

        // If sections list is empty, return error
        if($sections->count() == 0){
            return $this->responseSuccess([], "Error. The list of homework is empty");
        }

        // If everything is ok, return category list
        return $this
            ->responseSuccess(
                $sections->toArray(),
                'Homework list retrieved successfully'
            );
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
