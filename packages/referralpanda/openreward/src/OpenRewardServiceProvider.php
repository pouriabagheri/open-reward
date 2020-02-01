<?php

namespace ReferralPanda\OpenReward;

use Illuminate\Support\ServiceProvider;
use ReferralPanda\OpenReward\Repository\BadgeRepository;
use ReferralPanda\OpenReward\Repository\Interfaces\BadgeInterface;
use ReferralPanda\OpenReward\Repository\Interfaces\RewardInterface;
use ReferralPanda\OpenReward\Repository\RewardRepository;

class OpenRewardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/open_reward.php', 'open_reward'
        );
        $this->registerRepository();
    }

    /**`
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/Routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
        $this->publishes([
            __DIR__.'/config/open_reward.php' => config_path('open_reward.php')
        ]);
    }

    /**
     * Register the repository.
     */
    private function registerRepository()
    {
        $this->app->bind(RewardInterface::class, RewardRepository::class);
        $this->app->bind(BadgeInterface::class, BadgeRepository::class);
    }
}
