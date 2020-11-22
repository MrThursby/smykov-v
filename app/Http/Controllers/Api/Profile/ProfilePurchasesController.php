<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\Purchases\ProfilePurchasesStoreRequest;
use App\Models\School\SchoolCourse;
use App\Models\School\SchoolFork;
use App\Models\School\SchoolPurchase;
use App\Repositories\School\SchoolPurchasesRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfilePurchasesController extends BaseController
{
    /**
     * @var SchoolPurchasesRepository
     */
    protected $schoolPurchasesRepository;

    /**
     * SchoolPurchasesRepository constructor.
     */
    public function __construct()
    {
        $this->schoolPurchasesRepository = app(SchoolPurchasesRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        // Get courses list
        $purchases = $this->schoolPurchasesRepository->getByPurchaserWithCoursesWithPaginate(Auth()->id());

        // If sections list is empty, return error
        if ($purchases->count() == 0) {
            return $this->responseError('Error. The list of purchases is empty');
        }

        // If everything is ok, return category list
        return $this->responseSuccess(
            $purchases->toArray(),
                'Purchases retrieved successfully'
            );
    }

    /**
     * Store purchase
     * @param ProfilePurchasesStoreRequest $request
     */
    public function store(ProfilePurchasesStoreRequest $request)
    {
        $purchase = new SchoolPurchase;

        if($request->input('fork_id') != null) {
            $fork = SchoolFork::find($request->input('fork_id'));
            $purchase->spent_rubles = $fork->price;
        } else {
            $course = SchoolCourse::find($request->input('course_id'));
            $purchase->spent_rubles = $course->price;
        }

        $purchase->purchaser_id = Auth()->id();
        $purchase->course_id = $request->input('course_id');
        $purchase->fork_id = $request->input('fork_id');

        // Save section
        if($purchase->save()){
            // If everything is ok, return success message
            return $this
                ->responseSuccess(
                    [],
                    'Sections save successfully'
                );
        } else {
            // Error if purchase don't save
            return $this->responseError('Error. Section don\'t save');
        }
    }
}
