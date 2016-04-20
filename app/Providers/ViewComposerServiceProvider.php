<?php

namespace App\Providers;

use App\Http\Composers\FooterComposer;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeFooter();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composeFooter()
    {
        view()->composer('partials._footer', FooterComposer::class);
    }
}
