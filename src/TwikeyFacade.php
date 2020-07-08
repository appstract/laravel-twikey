<?php

namespace Appstract\LaravelTwikey;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Appstract\Skeleton\SkeletonClass
 */
class TwikeyFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'twikey';
    }
}
