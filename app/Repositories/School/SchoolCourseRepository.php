<?php


namespace App\Repositories\School;


use App\Models\School\SchoolCourse as Model;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class SchoolCourseRepository extends BaseRepository
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
            ->select('id', 'title', 'slug', 'preview_src', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get category list with paginate
     *
     * @return Collection
     */
    public function getAllWithPaginate() {
        return $this->start()
            ->select('id', 'title', 'slug', 'preview_src', 'created_at')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
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
