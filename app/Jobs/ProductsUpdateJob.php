<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Osiset\ShopifyApp\Objects\Values\ShopDomain;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\ProductDetail;

class ProductsUpdateJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $shopDomain;
    public $data;

    public function __construct($shopDomain, $data) {
        $this->shopDomain = $shopDomain;
        $this->data = $data;
    }

    public function handle(): void {
        Log::info('Product updated');
        // try {
        //     $shop = User::where('name', $this->shopDomain)->first();

        //     if (!$shop) {
        //         Log::error("Shop not found: {$this->shopDomain}");
        //         return;
        //     }

        //     // Extract product data
        //     $productData = [
        //         'shopify_id' => $this->data->id,
        //         'title' => $this->data->title,
        //         'description' => $this->data->body_html ?? '',
        //         // Add other fields from $this->data
        //     ];

        //     // Save/update product
        //     $this->saveProduct($productData);

        //     Log::info('Product updated', $productData);
        // } catch (\Exception $e) {
        //     Log::error("ProductsUpdateJob failed: " . $e->getMessage());
        //     throw $e;
        // }
    }

    private function saveProduct(array $productData): void {
        ProductDetail::updateOrCreate(
            ['shopify_id' => $productData['shopify_id']],
            $productData
        );
    }
}
