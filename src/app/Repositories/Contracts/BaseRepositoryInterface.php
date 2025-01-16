<?php

namespace App\Repositories\Contracts;

interface BaseRepositoryInterface
{
    public function all();
    public function find(string $id);
    public function create(array $data);
    public function update(array $data, string $id);
    public function delete(string $id);
}
