<?php

namespace Mrwang211\PinyinPro\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mrwang211\PinyinPro\PinyinPro
 */
class PinyinPro extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Mrwang211\PinyinPro\PinyinPro::class;
    }
}
