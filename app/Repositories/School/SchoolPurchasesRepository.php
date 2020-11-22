<?php


namespace App\Repositories\School;

use App\Models\School\SchoolPurchase as Model;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SchoolPurchasesRepository extends BaseRepository
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
     * @param int $purchaser_id
     * @param int $per_page
     * @return Collection
     */
    public function getByPurchaserWithCoursesWithPaginate($purchaser_id, $per_page = 12) {
        return $this->start()
            ->where('purchaser_id', $purchaser_id)
            ->with('course')
            ->get()
            ->unique('course_id');
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
