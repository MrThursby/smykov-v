<?php


namespace App\Repositories\Blog;


use App\Models\Blog\BlogCategory;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BlogCategoryRepository extends BaseRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return BlogCategory::class;
    }

    /**
     * Get category list
     *
     * @return Collection
     */
    public function getAll() {
        return $this->start()->all();
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
