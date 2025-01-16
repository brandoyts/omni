<?php

namespace App\Repositories;

use App\Models\CaseIop;
use App\Repositories\Contracts\CaseRepositoryInterface;

class CaseRepository implements CaseRepositoryInterface
{
    public function all()
    {
        return CaseIop::all();
    }

    public function find($id)
    {
        return CaseIop::find($id);
    }

    public function create(array $data)
    {
        return CaseIop::create($data);
    }

    public function update(array $data, string $id)
    {
        $case = CaseIop::findOrFail($id);
        $case->update($data);
        return $case;
    }


    public function delete(string $id)
    {
        return  CaseIop::findOrFail($id)->delete($id);
    }

    public function testsss(array $data, string $id)
    {
        //asdsad
    }
}
