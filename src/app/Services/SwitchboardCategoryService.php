<?php

namespace App\Services;

use App\Repositories\Contracts\SwitchboardCategoryRepositoryInterface;

class SwitchboardCategoryService
{
    protected $switchboardCategoryRepository;

    public function __construct(SwitchboardCategoryRepositoryInterface $switchboardCategoryRepository)
    {
        $this->switchboardCategoryRepository = $switchboardCategoryRepository;
    }

    public function create(array $data)
    {
        return $this->switchboardCategoryRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->switchboardCategoryRepository->update($data, $id);
    }

    public function all()
    {
        return $this->switchboardCategoryRepository->all();
    }

    public function find($id)
    {
        return $this->switchboardCategoryRepository->find($id);
    }
}
