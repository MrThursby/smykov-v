<?php


namespace App\Repositories;


use App\Models\User as Model;
use Illuminate\Database\Eloquent\Collection;

class ProfileRepository extends BaseRepository
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
     * @return Model
     */
    public function getById($user_id) {
        //return $this->start()->find($user_id);
        return $this->start()
            ->select('id', 'name', 'first_name', 'last_name')
            ->whereId($user_id)->first();
    }
}
