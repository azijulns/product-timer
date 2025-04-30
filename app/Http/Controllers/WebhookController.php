<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseResponse;
use Osiset\ShopifyApp\Util;


class WebhookController extends Controller
{
    public function handle(string $type, Request $request): ResponseResponse {
        // Get the job class and dispatch
        $jobClass = Util::getShopifyConfig('job_namespace') . str_replace('-', '', ucwords($type, '-')) . 'Job';
        $jobData = json_decode($request->getContent());

        // If we have manually mapped a class, use that instead
        $config = Util::getShopifyConfig('webhooks');
        if (!empty($config[$type]['class'])) {
            $jobClass = $config[$type]['class'];
        }
        
        $jobClass::dispatch(
            $request->header('x-shopify-shop-domain'),
            $jobData
        )->onConnection(Util::getShopifyConfig('job_connections')['webhooks'])
            ->onQueue(Util::getShopifyConfig('job_queues')['webhooks']);

        return Response::make('', ResponseResponse::HTTP_CREATED);
    }
}
