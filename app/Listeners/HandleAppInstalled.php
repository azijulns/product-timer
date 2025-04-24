<?php

namespace App\Listeners;

use Osiset\ShopifyApp\Messaging\Events\ShopAuthenticatedEvent;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;

class HandleAppInstalled {
    public function handle(ShopAuthenticatedEvent $event) {
        Log::info('🛠️ AppInstalledEvent fired for shop ID ' . $event->shopId->toNative());
    }
}
