<?php


namespace App\Repositories;


use App\Models\User as Model;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Get category list
     *
     * @return Collection
     */
    public function getAll() {
        return $this->start()
            ->select('id', 'name', 'first_name', 'last_name')
            ->with('avatars:id,src_64x64')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @param integer $blog_category_id
     * @return Model
     */
    public function getById($blog_category_id) {
        return $this->start()->find($blog_category_id);
    }

    /**
     * @param string $blog_category_slug
     * @return Model
     */
    public function getBySlug($blog_category_slug) {
        return $this->start()->where('slug', $blog_category_slug)->first();
    }
}
