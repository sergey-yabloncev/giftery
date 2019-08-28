<?php

namespace Yabloncev\Giftery;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return Payment::class;
    }
}
