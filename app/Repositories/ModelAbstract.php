<?php

namespace App\Repositories;

abstract class ModelAbstract
{
    /**
     * Holds model object
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Instantiate model
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(\Illuminate\Database\Eloquent\Model $model)
    {
        $this->model = $model;
    }

    /**
     * Create data
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        $model = $this->model;
        foreach($data as $key => $value) {
            $model->{$key} = $value;
        }
        $model->save();
    }

    /**
     * Fetch all data
     *
     * @return array
     */
    public function all(): array
    {
        $data = $this->model::all();
        return $data->toArray();
    }

    /**
     * Fetch data using id
     *
     * @param integer $id
     * @return array
     */
    public function get(int $id): array
    {
        $data = $this->model::findOrFail($id);
        return $data->toArray();
    }

    /**
     * Update row using id
     *
     * @param integer $id
     * @param array $data
     * @return array
     */
    public function update(int $id, array $data): array
    {
        $model = $this->model::findOrFail($id);
        foreach($data as $key => $value) {
            $data->{$key} = $value;
        }
        $model->save();
        return $model->toArray();
    }

    /**
     * Soft delete row using id
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $model = $this->model::findOrFail($id);
        $model->delete();
    }
}
