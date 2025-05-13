<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_created()
    {
        $product = Product::create([
            'name' => 'Smart TV',
            'brand' => 'Samsung',
            'model' => 'UA43T5300',
            'category' => 'TV',
            'price' => 300.00,
            'stock_quantity' => 10
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Smart TV',
            'brand' => 'Samsung',
        ]);
    }
}
