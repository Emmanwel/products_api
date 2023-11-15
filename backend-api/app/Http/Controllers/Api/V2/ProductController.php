<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Product;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResource::collection(auth()->user()->tasks()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $task = $request->user()->tasks()->create($request->validated());

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
