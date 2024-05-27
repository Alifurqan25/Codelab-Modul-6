<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Http\Resources\ProductCategoryCollection;
use App\Http\Resources\ProductCategoryResource;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $queryData = ProductCategory::all();
            $formattedDatas = new ProductCategoryCollection($queryData);
            return response()->json([
                "message" => "success",
                "data" => $formattedDatas
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreProductCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProductCategoryRequest $request)
    {
        $validatedRequest = $request->validated();
        try {
            $queryData = ProductCategory::create($validatedRequest);
            $formattedDatas = new ProductCategoryResource($queryData);
            return response()->json([
                "message" => "success",
                "data" => $formattedDatas
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        try {
            $queryData = ProductCategory::findOrFail($id);
            $formattedDatas = new ProductCategoryResource($queryData);
            return response()->json([
                "message" => "success",
                "data" => $formattedDatas
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProductCategoryRequest $request
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductCategoryRequest $request, string $id)
    {
        $validatedRequest = $request->validated();
        try {
            $queryData = ProductCategory::findOrFail($id);
            $queryData->update($validatedRequest);
            $formattedData = new ProductCategoryResource($queryData);
            return response()->json([
                "message" => "success",
                "data" => $formattedData
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        try {
            $queryData = ProductCategory::findOrFail($id);
            $queryData->delete();
            $formattedData = new ProductCategoryResource($queryData);
            return response()->json([
                "message" => "success",
                "data" => $formattedData
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }
}
