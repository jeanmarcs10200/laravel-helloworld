<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Google\Cloud\Logging\LoggingClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $projectId = env('GOOGLE_CLOUD_PROJECT_ID'); // Ensure you have this in your .env file
        $logging = new LoggingClient([
            'projectId' => $projectId
        ]);
        $logger = $logging->psrLogger('app');

        // You can bind the logger to the service container if needed
        $this->app->instance('GoogleCloudLogger', $logger);
    }
}