<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        $web = ['web'];
        $domain = parse_url(config('app.url'), PHP_URL_HOST);

        Route::domain($domain)->middleware('web')
            ->middleware($web)
            ->namespace($this->namespace)
            ->group(base_path('routes/landlord/web.php'));

        if(config('multitenancy.enabled')) {
            array_push($web, 'tenant.web');
        }
        
        Route::middleware('web')
            ->middleware($web)
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        $api = ['api'];
        if(config('multitenancy.enabled')) {
            array_push($api, 'tenant.api');
        }

        Route::prefix('api')
            ->middleware($api)
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
