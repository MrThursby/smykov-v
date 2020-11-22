<?php


namespace App\Repositories;


use App\Models\Avatar as Model;
use Illuminate\Database\Eloquent\Collection;

class AvatarRepository extends BaseRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param integer $user_id
     * @return String
     */
    public function getByUserId($user_id) {
        //return $this->start()->find($user_id);
        $avatar = $this->start()
            ->select('id', 'src_64x64')
            ->whereAuthorId($user_id)->first();
        if(!$avatar){
            return asset('storage/images/user.png');
        } else {
            $avatar = asset($avatar->src_64x64);
        }
        return $avatar;
    }
}
