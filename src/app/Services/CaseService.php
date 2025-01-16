<?php

namespace App\Services;

use App\Events\CreateCase;
use App\Events\SelfCaseCreated;
use App\Repositories\Contracts\CaseRepositoryInterface;

class CaseService
{
    protected $caseRepository;

    public function __construct(CaseRepositoryInterface $caseRepository)
    {
        $this->caseRepository = $caseRepository;
    }

    public function createSelfCase(array $data)
    {
        $case = $this->caseRepository->create($data);
        SelfCaseCreated::dispatch($case);
        return $case;
    }

    public function update(array $data, $id)
    {
        return $this->caseRepository->update($data, $id);
    }

    public function all()
    {
        return $this->caseRepository->all();
    }

    public function find($id)
    {
        return $this->caseRepository->find($id);
    }

    public function reroute($id)
    {
        return $this->caseRepository->find($id);
    }
}


