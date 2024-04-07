<?php

namespace AsaGick\Portfolio;

use App\Models\Experience;
use AsaGick\Portfolio\Services\Portfolio;
use Illuminate\Console\Application;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class PortfolioServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->singleton(Connection::class, function (Application $app) {
        //     return new Connection(config('riak'));
        // });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom([
            __DIR__ . "/../database/migrations/2024_03_04_173612_create_socials_table.php",
            __DIR__ . "/../database/migrations/2024_03_04_173619_create_skills_table.php",
            __DIR__ . "/../database/migrations/2024_03_04_173644_create_team_members_table.php",
            __DIR__ . "/../database/migrations/2024_04_02_160539_create_experiences_table.php",
        ]);

        $this->app->singleton('portfolio', function () {
            return new Portfolio();
        });
    }
}
