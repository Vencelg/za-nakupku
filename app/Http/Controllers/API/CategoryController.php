<?php

namespace App\Http\Controllers\API;

use App\Exceptions\ControllerException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\ResponseService;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = Category::all();

        return $this->response($categories, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return JsonResponse
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $newCategory = new Category([
            'name' => $request->input('name'),
            'code' => $request->input('code')
        ]);
        $newCategory->save();

        return $this->response($newCategory, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     * @throws ControllerException
     */
    public function show(int $id): JsonResponse
    {
        $category = Category::find($id);
        if (!($category instanceof Category)) {
            throw new ControllerException('Category with id: ' . $id . ' not found', 400);
        }

        return $this->response($category, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws ControllerException
     */
    public function update(UpdateCategoryRequest $request, int $id): JsonResponse
    {
        $category = Category::find($id);
        if (!($category instanceof Category)) {
            throw new ControllerException('Category with id: ' . $id . ' not found', 400);
        }

        $category->update($request->all());
        $category->save();

        return $this->response($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws ControllerException
     */
    public function destroy(int $id): JsonResponse
    {
        $category = Category::find($id);
        if (!($category instanceof Category)) {
            throw new ControllerException('Category with id: ' . $id . ' not found', 400);
        }

        $category->delete();
        return $this->response([], 200);
    }
}
