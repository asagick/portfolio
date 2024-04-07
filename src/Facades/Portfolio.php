<?php

namespace AsaGick\Portfolio\Facades;

use Illuminate\Support\Facades\Facade;

class Portfolio extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'portfolio';
    }
}
