<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\AvatarRepository;
use App\Repositories\ProfileRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends BaseController
{
    /**
     * @var ProfileRepository
     */
    protected $profileRepository;

    protected $avatarRepository;

    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->profileRepository = app(ProfileRepository::class);
        $this->avatarRepository = app(AvatarRepository::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show()
    {
        $profile = $this->profileRepository->getById(auth()->id());
        if(!$profile){
            return $this->responseError('Error. The profile not found.');
        }
        $avatar = $this->avatarRepository->getByUserId($profile->id);
        $profile->avatar = $avatar;
        return $this
            ->responseSuccess(
                $profile->toArray(),
                'Profile retrieved successfully'
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
