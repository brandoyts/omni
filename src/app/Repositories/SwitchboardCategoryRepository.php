<?php


namespace App\Repositories;

use App\Models\SwitchboardCategory;
use App\Repositories\Contracts\SwitchboardCategoryRepositoryInterface;

class SwitchboardCategoryRepository implements SwitchboardCategoryRepositoryInterface
{
    public function all()
    {
        return SwitchboardCategory::all();
    }

    public function create(array $data)
    {
        return SwitchboardCategory::create($data);
    }

    public function update(array $data, $id)
    {
        $switchboardCategory = SwitchboardCategory::findOrFail($id);
        $switchboardCategory->update($data);
        return $switchboardCategory;
    }

    public function find($id)
    {
        return SwitchboardCategory::findOrFail($id);
    }

    public function delete($id)
    {
        return SwitchboardCategory::find($id)->delete();
    }
}
