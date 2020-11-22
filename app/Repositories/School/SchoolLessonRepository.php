<?php


namespace App\Repositories\School;


use App\Models\School\SchoolLesson as Model;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SchoolLessonRepository extends BaseRepository
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
     * @param int $section_id
     * @return Collection
     */
    public function getAllBySectionId($section_id)
    {
        return $this->start()
            ->select('section_id', 'title', 'local_id', 'mark')
            ->whereSectionId($section_id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @param integer $lesson_id
     * @return Model
     */
    public function getById($lesson_id)
    {
        return $this->start()->find($lesson_id);
    }

    /**
     * @param string $blog_category_slug
     * @return Model
     */
    public function getBySlug($blog_category_slug)
    {
        return $this->start()->where('slug', $blog_category_slug)->first();
    }

    public function getLastIdAllowedByCourseForUser($course_id, $user_id)
    {
        $lesson_not_allow_next = $this->start()
            ->select('id', 'section_id')
            ->whereHas('homeworks', function (Builder $query) {
                $query->whereAllowNext(0);
            })->first();
        if (!$lesson_not_allow_next) {
            $lesson = $this->start()
                ->select('id', 'section_id')
                ->doesntHave('homeworks')
                ->whereHas('section.fork.purchases', function (Builder $query) use ($user_id) {
                    $query->wherePurchaserId($user_id);
                })
                ->whereHas('section', function (Builder $query) use ($course_id) {
                    $query->whereCourseId($course_id);
                })
                ->first();
        } else {
                $lesson = $lesson_not_allow_next;
        }
        return $lesson->id;
    }
}
