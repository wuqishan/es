<?php

namespace App\Facades;

class ServiceAgent extends FacadeBase
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ServiceAgent';
    }
}
