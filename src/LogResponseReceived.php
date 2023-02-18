<?php

namespace Krsriq\LaravelHttpTestGenerator;

use Illuminate\Http\Client\Events\ResponseReceived;

class LogResponseReceived
{
    public function __invoke(ResponseReceived $event): void
    {
        app(LaravelHttpTestGenerator::class)->addCall($event->request, $event->response);
    }
}
