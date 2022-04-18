<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create_product()
    {
        $this->postJson(route('products.store'), [
            'name' => 'Product 1',
            'description' => 'Product 1 description',
            'price' => '100',
            'sku' => 'sku-1',
            'in_stock' => true,
            'price' => '100',
        ])->assertStatus(201);
    }

    public function test_product_can_add_tag()
    {
        $product = Product::factory()->create();

        $this->postJson(route('products.add-tag', $product), [
            'name' => 'Tag 1',
        ])->assertStatus(200)
        ->assertSee('Tag 1');
    }

    public function test_can_not_add_duplicate_tags()
    {
        $product = Product::factory()->create();

        $this->postJson(route('products.add-tag', $product), [
            'name' => 'Tag 1',
        ])->assertStatus(200)
        ->assertSee('Tag 1');

        $this->postJson(route('products.add-tag', $product), [
            'name' => 'Tag 1',
        ])->assertStatus(422);
    }

    public function test_can_update_product()
    {
        $product = Product::factory()->create();

        $this->putJson(route('products.update', $product), [
            'name' => 'Product updated',
            'description' => 'Product 1 description',
            'price' => '100',
            'sku' => 'sku-updated',
            'in_stock' => true,
            'price' => '100',
        ])->assertStatus(200)
        ->assertSee('Product updated')
        ->assertSee('Product 1 description')
        ->assertSee('100')
        ->assertSee('sku-updated');
    }

    public function test_get_products_in_stock()
    {
        Product::factory()->create([
            'name' => 'Product 1',
            'in_stock' => true,
        ]);

        Product::factory()->create([
            'name' => 'Product NOT in stock',
            'in_stock' => false,
        ]);

        $this->get(route('products.index', ['in_stock' => 'true']))
            ->assertStatus(200)
            ->assertSee('Product 1')
            ->assertDontSee('Product NOT in stock');
    }
}
