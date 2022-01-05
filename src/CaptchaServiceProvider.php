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

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
class CaptchaServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath($raw = __DIR__ . '/config.php') ?: $raw;
        if ($this->app->runningInConsole()) {
            $this->publishes([$source => config_path('captcha.php')], 'laravel-captcha');
        }
        if (!$this->app->configurationIsCached()) {
            $this->mergeConfigFrom($source, 'captcha');
        }
        if (!$this->app->routesAreCached()) {
            if (Route::hasMiddlewareGroup('web')) {
                Route::middleware('web')->get('captcha/{config?}', [CaptchaController::class, 'showCaptcha'])->name('captcha');
            } else {
                Route::get('captcha/{config?}', [CaptchaController::class, 'showCaptcha'])->name('captcha');
            }
        }
        Validator::extend('captcha', function ($attribute, $value, $parameters, $validator) {
            return captcha_check($value);
        }, ':attribute错误!');
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Captcha::class, function ($app) {
            return new Captcha($app['config'], $app['request']);
        });
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Captcha::class];
    }
}