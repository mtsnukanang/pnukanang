<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Shares site-wide settings (logo, address, contact info) to all Blade views.
 * Settings are cached implicitly via Setting::all() once per request.
 */
class ShareGlobalSettings
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $settings = Setting::pluck('value', 'key')->toArray();
        } catch (\Throwable $e) {
            // DB might not be migrated yet, fail silently.
            $settings = [];
        }

        View::share('siteSettings', $settings);
        View::share('siteName', $settings['site_name'] ?? 'Pondok Pesantren Nahdlatul Ummah Kanang');

        return $next($request);
    }
}
