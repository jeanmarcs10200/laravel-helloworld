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
        $projectId = env('GOOGLE_CLOUD_PROJECT_ID'); 
        $logging = new LoggingClient([
            'projectId' => $projectId
        ]);
        $logger = $logging->psrLogger('app');

        $this->app->instance('GoogleCloudLogger', $logger);

        // Add a test log entry
        $logger->info('Google Cloud Logging is configured correctly.');
    }
}