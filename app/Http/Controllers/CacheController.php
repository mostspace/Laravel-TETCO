<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    /**
     * Clear all types of cache.
     *
     * @return string
     */
    public function clearAllCache()
    {
        // Clear application cache
        Artisan::call('cache:clear');

        // Clear configuration cache
        Artisan::call('config:clear');

        // Clear configuration and route cache
        Artisan::call('config:cache');
        Artisan::call('route:clear');
        Artisan::call('route:cache');

        // Clear view cache
        Artisan::call('view:clear');

        return "All Caches Cleared..!";
    }
}
