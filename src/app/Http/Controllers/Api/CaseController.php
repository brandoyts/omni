<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSelfCaseRequest;
use App\Services\CaseService;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    protected $caseService;

    public function __construct(CaseService $caseService)
    {
        $this->caseService = $caseService;
    }

    public function getCases()
    {
        $cases = $this->caseService->all();
        return response()->json([
            "message" => "success",
            "cases" => $cases
        ]);
    }

    public function getCase($id)
    {
        $case = $this->caseService->find($id);

        if (!$case) {
            return response()->json([
            "message" => "success",
            "case" => null
            ],400);
        }
        return response()->json([
            "message" => "success",
            "case" => $case
        ]);
    }

    public function createSelfCase(CreateSelfCaseRequest $request)
    {
        $selfCase = $this->caseService->createSelfCase($request->all());

        return response()->json([
            "message" => "success",
            "case" => $selfCase
        ]);
    }

    public function updateCase(Request $request, $id)
    {
        $updatedCase = $this->caseService->update($request->all(), $id);

        return response()->json([
            "message" => "success",
            "case" => $updatedCase
        ]);
    }
}
