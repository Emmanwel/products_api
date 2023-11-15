<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase, WithFaker, WithoutMiddleware;

    public function test_can_get_all_products()
    {
        // Assuming you have a Product model and a corresponding migration
        factory(Task::class, 5)->create();

        $response = $this->json('GET', '/api/products');

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'name'],
                ],
            ]);
    }

    public function test_can_create_product()
    {
        $productData = [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
        ];

        $response = $this->json('POST', '/api/products', $productData);

        $response->assertStatus(201)
            ->assertJsonStructure(['data' => ['id', 'name', 'description', 'created_at', 'updated_at']])
            ->assertJson([
                'data' => $productData,
            ]);
    }

    public function test_can_update_product()
    {
        $product = factory(Task::class)->create();

        $updatedData = [
            'name' => $this->faker->word,

        ];

        $response = $this->json('PUT', '/api/products/' . $product->id, $updatedData);

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ['id', 'name', 'description', 'created_at', 'updated_at']])
            ->assertJson([
                'data' => $updatedData,
            ]);
    }

    public function test_can_delete_product()
    {
        $product = factory(Task::class)->create();

        $response = $this->json('DELETE', '/api/products/' . $product->id);

        $response->assertStatus(204);
    }

    // You can add more tests for validation, edge cases, etc.
}