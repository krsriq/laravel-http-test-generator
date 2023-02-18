<?php

namespace Krsriq\LaravelHttpTestGenerator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Krsriq\LaravelHttpTestGenerator\LaravelHttpTestGenerator
 */
class LaravelHttpTestGeneratorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return LaravelHttpTestGenerator::class;
    }
}
