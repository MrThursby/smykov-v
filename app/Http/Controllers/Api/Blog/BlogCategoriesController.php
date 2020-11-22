<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Blog\BlogCategory;
use App\Repositories\Blog\BlogCategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogCategoriesController extends BaseController
{
    /**
     * @var BlogCategoryRepository
     */
    public $blogCategoryRepository;

    /**
     * BlogCategoriesController constructor.
     */
    public function __construct()
    {
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        // Get categories list
        $categories = $this->blogCategoryRepository->getAll();
        // If categories list is empty, return error
        if($categories->count() == 0){
            return $this->responseError('Error. The list of categories is empty');
        }
        // If everything is ok, return category list
        return $this
            ->responseSuccess(
                $categories->toArray(),
                'Categories retrieved successfully'
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function create()
    {
        return $this->responseError(
            'What the hell do you want???'
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
     * @param  string  $slug
     * @return JsonResponse
     */
    public function show($slug)
    {
        $category = $this->blogCategoryRepository->getBySlug($slug);
        if(!$category){
            return $this->responseError('Error. Category not found');
        }
        return $this->responseSuccess(
            $category->toArray(),
            'Blog\'s category retrieved success'
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function edit($id)
    {
        $category = BlogCategory::find($id);
        if(!$category){
            return $this->responseError('Error. Category not found');
        }
        return $this->responseSuccess(
            $category->toArray(),
            'Blog\'s category retrieved success'
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
