<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Sale;

class SaleTest extends TestCase
{
    use RefreshDatabase;

    public function test_sale_can_be_recorded()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create([
            'stock_quantity' => 10
        ]);

        $this->actingAs($user);

        $sale = Sale::create([
            'user_id' => $user->id,
            'total_amount' => 200.00,
        ]);

        $sale->items()->create([
            'product_id' => $product->id,
            'quantity' => 1,
            'price_at_sale' => 200.00,
        ]);

        $this->assertDatabaseHas('sales', [
            'user_id' => $user->id,
            'total_amount' => 200.00,
        ]);

        $this->assertDatabaseHas('sale_items', [
            'product_id' => $product->id,
            'quantity' => 1,
            'price_at_sale' => 200.00,
        ]);
    }
}
