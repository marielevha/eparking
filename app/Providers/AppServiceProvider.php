<?php

namespace App\Providers;

use App\Services\PermissionService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Model::unguard();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Inertia::share ( [
            'locale' => function() {
                return app() -> getLocale() ;
            } ,
            'language' => function() {
                return translations (
                    resource_path('lang/'.app() -> getLocale().'.json' )
                ) ;
            } ,
        ] ) ;
        Inertia::share('permissions', fn (Request $request) => $request->user()
            ? PermissionService::findAllPermissions()
            : null
        );
    }
}
