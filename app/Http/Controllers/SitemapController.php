<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $pages = [
            ['url' => url('/'), 'priority' => '1.00', 'changefreq' => 'weekly'],
            ['url' => url('/pricing'), 'priority' => '0.90', 'changefreq' => 'weekly'],
            ['url' => url('/use-cases'), 'priority' => '0.80', 'changefreq' => 'monthly'],
            ['url' => url('/about'), 'priority' => '0.80', 'changefreq' => 'monthly'],
            ['url' => url('/docs'), 'priority' => '0.80', 'changefreq' => 'weekly'],
            ['url' => url('/docs/api/json-api'), 'priority' => '0.60', 'changefreq' => 'monthly'],
            ['url' => url('/docs/api/authentication'), 'priority' => '0.60', 'changefreq' => 'monthly'],
            ['url' => url('/docs/api/pages'), 'priority' => '0.60', 'changefreq' => 'monthly'],
            ['url' => url('/docs/api/menus'), 'priority' => '0.60', 'changefreq' => 'monthly'],
            ['url' => url('/docs/api/taxonomies'), 'priority' => '0.60', 'changefreq' => 'monthly'],
            ['url' => url('/docs/api/media'), 'priority' => '0.60', 'changefreq' => 'monthly'],
            ['url' => url('/docs/api/site'), 'priority' => '0.60', 'changefreq' => 'monthly'],
            ['url' => url('/docs/features/workflow'), 'priority' => '0.60', 'changefreq' => 'monthly'],
            ['url' => url('/docs/features/versioning'), 'priority' => '0.60', 'changefreq' => 'monthly'],
            ['url' => url('/partners'), 'priority' => '0.70', 'changefreq' => 'monthly'],
            ['url' => url('/trust'), 'priority' => '0.50', 'changefreq' => 'monthly'],
            ['url' => url('/security'), 'priority' => '0.50', 'changefreq' => 'monthly'],
            ['url' => url('/privacy'), 'priority' => '0.30', 'changefreq' => 'yearly'],
            ['url' => url('/terms'), 'priority' => '0.30', 'changefreq' => 'yearly'],
        ];

        $content = view('sitemap', ['pages' => $pages])->render();

        return response($content, 200, ['Content-Type' => 'application/xml']);
    }
}
