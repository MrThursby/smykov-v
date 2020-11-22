<?php


namespace App\Repositories\School;


use App\Models\School\SchoolHomework as Model;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class SchoolHomeworkRepository extends BaseRepository
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
    public function getAllByLessonIdWithChecks($lesson_id, $author_id) {
        return $this->start()
            ->whereLessonId($lesson_id)
            ->whereAuthorId($author_id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @param integer $lesson_id
     * @return Model
     */
    public function getById($homework_id) {
        return $this->start()->find($homework_id);
    }
}
