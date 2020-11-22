<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @return void
     */
    public function __construct() {
        $this->model = app($this->getModelClass());
    }

    /**
     * Get Model of specific repository
     *
     * @return string
     */
    abstract protected function getModelClass();

    /**
     * Start conditions
     *
     * @return Model
     */
    protected function start() {
        return clone $this->model;
    }
}
