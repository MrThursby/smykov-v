<?php


namespace App\Repositories\School;


use App\Models\School\SchoolSection as Model;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class SchoolSectionRepository extends BaseRepository
{
    protected $schoolLessonRepository;

    public function __construct()
    {
        parent::__construct();
        $this->schoolLessonRepository = app(SchoolLessonRepository::class);
    }

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
     * @param int $course_id
     * @return Collection
     */
    public function getAllByCourseIdWithLessons($course_id) {
        return $this->start()
            ->whereCourseId($course_id)
            ->orderBy('created_at', 'desc')
            ->with('lessons')
            ->get();
    }

    /**
     * Get category list
     *
     * @param int $course_id
     * @param int $user_id
     * @return Collection
     */
    public function getAllowedByCourseIdWithLessonsForUser($course_id, $user_id) {
        $last_allowed_lesson_id = $this->schoolLessonRepository->getLastIdAllowedByCourseForUser($course_id, $user_id);
        return $this->start()
            ->whereCourseId($course_id)
            ->whereHas('fork.purchases', function (Builder $query) use ($user_id) {
                $query->wherePurchaserId($user_id);
            })
            ->whereHas('lessons', function (Builder $query) use ($last_allowed_lesson_id) {
                $query->where('id', '<=', $last_allowed_lesson_id);
            })
            ->orderBy('created_at', 'desc')
            ->with(['lessons' => function($query) use ($last_allowed_lesson_id) {
                $query->where('id', '<=', $last_allowed_lesson_id);
            }])
            ->get();
    }

    /**
     * Get category list
     *
     * @param int $fork_id
     * @return Collection
     */
    public function getAllByForkId($fork_id) {
        return $this->start()
            ->whereForkId($fork_id)
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
