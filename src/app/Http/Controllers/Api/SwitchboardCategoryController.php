<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SwitchboardCategoryService;
use Illuminate\Http\Request;

class SwitchboardCategoryController extends Controller
{
    protected $switchboardCategoryService;

    public function __construct(SwitchboardCategoryService $switchboardCategoryService)
    {
        $this->switchboardCategoryService = $switchboardCategoryService;
    }

    public function all()
    {
        $switchboardCategories = $this->switchboardCategoryService->all();
        return response()->json([
            "message" => "success",
            "switchboardCategories" => $switchboardCategories
        ]);
    }

    public function create(Request $request)
    {
        $switchboardCategory = $this->switchboardCategoryService->create($request->all());
        return response()->json([
            "message" => "success",
            "switchboardCategory" => $switchboardCategory
        ]);
    }

}
