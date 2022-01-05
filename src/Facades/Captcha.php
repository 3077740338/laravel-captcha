<?php
/*
|----------------------------------------------------------------------------
| TopWindow [ Internet Ecological traffic aggregation and sharing platform ]
|----------------------------------------------------------------------------
| Copyright (c) 2006-2019 http://yangrong1.cn All rights reserved.
|----------------------------------------------------------------------------
| Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
|----------------------------------------------------------------------------
| Author: yangrong <yangrong2@gmail.com>
|----------------------------------------------------------------------------
*/

namespace Learn\Captcha\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Http\Response create(string $config = null)
 * @method static bool check(string $code)
 *
 * @see \Learn\Captcha\CaptchaInterface
 */
class Captcha extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Learn\Captcha\Captcha::class;
    }
}