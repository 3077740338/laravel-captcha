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

namespace Learn\Captcha;

interface CaptchaInterface
{
    /**
     * 验证验证码是否正确
     * 
     * @param  string $code 用户验证码
     * @return bool 
     */
    public function check(string $code);
	
    /**
     * 输出验证码并把验证码的值保存的session中
     * 
     * @param  null|string  $config
     * @return \Illuminate\Http\Response
     */
    public function create(string $config = null);
}