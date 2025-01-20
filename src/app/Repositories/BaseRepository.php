<?php

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, string $id)
    {
        $case = $this->model->findOrFail($id);
        $case->update($data);
        return $case;
    }


    public function delete(string $id)
    {
        return  $this->model->findOrFail($id)->delete($id);
    }
}