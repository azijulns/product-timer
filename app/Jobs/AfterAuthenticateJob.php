<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Osiset\ShopifyApp\Contracts\Objects\Values\ShopDomain;
use App\Models\User;

class AfterAuthenticateJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $shop;
    /**
     * Create a new job instance.
     */
    public function __construct(User|ShopDomain $shop) {
        $this->shop = $shop;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        $scriptTags = config('shopify-app.scripttags', []);

        foreach ($scriptTags as $scriptTag) {
            $this->shop->api()->rest('POST', '/admin/api/'. env("SHOPIFY_API_VERSION").'/script_tags.json', [
                'script_tag' => $scriptTag,
            ]);
        }
    }
}
