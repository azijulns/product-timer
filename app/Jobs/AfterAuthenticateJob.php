<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AfterAuthenticateJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var Shop */
    public $shop;

    /**
     * Create a new job instance.
     *
     * @param  \App\Models\Shop  $shop
     */
    public function __construct(User $shop) {
        $this->shop = $shop;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        $apiVersion  = config('shopify-app.api_version');
        $scriptTags  = config('shopify-app.scripttags', []);
        $webhooks    = config('shopify-app.webhooks', []);

        foreach ($scriptTags as $scriptTag) {

            $this->shop
                ->api()
                ->rest('POST', "/admin/api/{$apiVersion}/script_tags.json", [
                    'script_tag' => $scriptTag,
                ]);
        }
        foreach ($webhooks as $webhook) {

            $this->shop
                ->api()
                ->rest('POST', "/admin/api/{$apiVersion}/webhooks.json", [
                    'webhook' => $webhook,
                ]);
        }
    }
}
