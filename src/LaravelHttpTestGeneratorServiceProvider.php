<?php

namespace Krsriq\LaravelHttpTestGenerator;

use Illuminate\Support\ServiceProvider;

class LaravelHttpTestGeneratorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->terminating(fn () => $this->app->make(LaravelHttpTestGenerator::class)->save());
    }

    public function register()
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->singleton(LaravelHttpTestGenerator::class, fn() => new LaravelHttpTestGenerator());
    }
}
