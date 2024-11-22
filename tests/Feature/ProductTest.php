<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_product()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson('/api/products', [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 99.99,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'name' => 'Test Product',
                'description' => 'Test Description',
                'price' => 99.99,
            ]);
    }
}

