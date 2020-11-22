<?php

namespace App\Http\Controllers\Api\School;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolPurchasesStoreRequest;
use App\Models\School\SchoolCourse;
use App\Models\School\SchoolFork;
use App\Models\School\SchoolPurchase;
use App\Repositories\School\SchoolPurchasesRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SchoolPurchasesController extends BaseController
{
    /**
     * @var SchoolPurchasesRepository
     */
    protected $schoolPurchasesRepository;

    /**
     * SchoolCoursesController constructor.
     */
    public function __construct()
    {
        $this->schoolPurchasesRepository = app(SchoolPurchasesRepository::class);
    }
    public function index() {
        // Get purchases list
        $courses = $this->schoolPurchasesRepository->getByPurchaserWithCoursesWithPaginate(auth()->id());
        // If purchases list is empty, return error
        if($courses->count() == 0){
            return $this->responseError('Error. The list of purchases courses is empty');
        }
        // If everything is ok, return category list
        return $this
            ->responseSuccess(
                $courses->toArray(),
                'Courses retrieved successfully'
            );
    }

    /**
     * @param SchoolPurchasesStoreRequest $request
     * @return JsonResponse
     */
    public function store(SchoolPurchasesStoreRequest $request) {
        if($request->fork_id != null) {
            $price = SchoolCourse::find($request->input('course_id'))->price;
        } else {
            $price = SchoolFork::find($request->input('fork_id'))->price;
        }

        $save = Auth()->user()->purchases()->push([
            'course_id' => $request->input('course_id'),
            'fork_id' => $request->input('fork_id'),
            'spent_rubles' => $price
        ]);

        if(!$save){
            return $this->responseError('Course can\'t been purchased');
        }

        // If everything is ok, return category list
        return $this
            ->responseSuccess(
                ['ez'],
                'Courses has been purchased successfully'
            );
    }
}
