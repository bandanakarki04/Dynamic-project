<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Solution;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_can_be_filtered_by_solution(): void
    {
        $solution = Solution::create([
            'name' => 'CRM',
            'description' => 'Customer relationship management',
            'category' => 'Software',
        ]);

        $matchingProduct = Product::create([
            'name' => 'CRM Product',
            'type' => 'Software',
        ]);

        $otherProduct = Product::create([
            'name' => 'Unrelated Product',
            'type' => 'Software',
        ]);

        $matchingProduct->solutions()->attach($solution);

        $response = $this->get('/products?solution=' . $solution->id);

        $response->assertOk();
        $response->assertSee('CRM Product');
        $response->assertDontSee('Unrelated Product');
    }

    public function test_products_can_be_filtered_by_tag(): void
    {
        $tag = Tag::create([
            'name' => 'B2B',
        ]);

        $matchingProduct = Product::create([
            'name' => 'B2B Product',
            'type' => 'Software',
        ]);

        Product::create([
            'name' => 'Other Product',
            'type' => 'Software',
        ]);

        $matchingProduct->tags()->attach($tag);

        $response = $this->get('/products?tag=' . $tag->id);

        $response->assertOk();
        $response->assertSee('B2B Product');
        $response->assertDontSee('Other Product');
    }

    public function test_products_can_be_filtered_by_solution_and_tag(): void
    {
        $solution = Solution::create([
            'name' => 'CRM',
            'category' => 'Software',
        ]);

        $tag = Tag::create([
            'name' => 'B2B',
        ]);

        $matchingProduct = Product::create([
            'name' => 'Matching Product',
            'type' => 'Software',
        ]);

        $matchingProduct->solutions()->attach($solution);
        $matchingProduct->tags()->attach($tag);

        $otherProduct = Product::create([
            'name' => 'Different Product',
            'type' => 'Software',
        ]);

        $otherProduct->solutions()->attach($solution);

        $response = $this->get(
            '/products?solution=' . $solution->id . '&tag=' . $tag->id
        );

        $response->assertOk();
        $response->assertSee('Matching Product');
        $response->assertDontSee('Different Product');
    }

    public function test_ajax_request_returns_products_list_only(): void
    {
        Product::create([
            'name' => 'AJAX Test Product',
            'type' => 'Software',
        ]);

        $response = $this->withHeader(
            'X-Requested-With',
            'XMLHttpRequest'
        )->get('/products');

        $response->assertOk();
        $response->assertSee('AJAX Test Product');
        $response->assertDontSee('Filter by solution:');
        $response->assertDontSee('Filter by tag:');
    }
}