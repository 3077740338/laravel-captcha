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
use Learn\Captcha\Facades\Captcha;
use Illuminate\Support\Facades\Route;
if (!function_exists('captcha')) {
    /**
     * @param string $config
     * @return \Illuminate\Http\Response
     */
    function captcha($config = null)
    {
        return Captcha::create($config);
    }
}
if (!function_exists('captcha_src')) {
    /**
     * @param $config
     * @return string
     */
    function captcha_src($config = null)
    {
        return Route::has('captcha') ? route('captcha', ['config' => $config]) : url('/captcha' . ($config ? sprintf('/%s', $config) : ''));
    }
}
if (!function_exists('captcha_img')) {
    /**
     * @param $id
     * @return string
     */
    function captcha_img($id = '', $domid = '')
    {
        $src = captcha_src($id);
        $domid = empty($domid) ? $domid : sprintf(' id="%s"', $domid);
        return sprintf('<img src="%s" alt="captcha"%s onclick="this.src=\'%s?\'+Math.random();"/>', $src, $domid, $src);
    }
}
if (!function_exists('captcha_check')) {
    /**
     * @param string $value
     * @return bool
     */
    function captcha_check($value)
    {
        return Captcha::check($value);
    }
}