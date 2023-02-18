<?php

namespace Krsriq\LaravelHttpTestGenerator;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'Illuminate\Http\Client\Events\ResponseReceived' => [
            LogResponseReceived::class,
        ],
    ];
}
