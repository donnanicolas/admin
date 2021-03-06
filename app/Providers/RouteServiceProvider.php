<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        view()->composer('layouts.admin', function ($view) {
            $view->with('avatarId', rand(1, 5));
        });

        $router->bind('domains', function ($domain) {
            return \App\PostfixDomain::where('domain', $domain)->firstOrFail();
        });

        $router->bind('mailboxes', function ($mailbox) {
            return \App\PostfixMailbox::where('username', $mailbox)->firstOrFail();
        });

        $router->bind('zones', function ($domain) {
            return \App\PowerdnsDomain::findOrFail($domain);
        });

        $router->bind('records', function ($record) {
            return \App\PowerdnsRecord::findOrFail($record);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
