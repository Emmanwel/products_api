<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $task = Product::create($request->validated());

        return ProductResource::make($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $task)
    {
        return ProductResource::make($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $task)
    {
        $task->update($request->validated());

        return ProductResource::make($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $task)
    {
        $task->delete();

        return response()->noContent();
    }
}
