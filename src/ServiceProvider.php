<?php

namespace Yabloncev\Giftery;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        // publishes config
        $this->publishes([
            __DIR__ . '/../config/giftery.php' => config_path('giftery.php'),
        ]);
    }
}
