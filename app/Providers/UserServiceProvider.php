<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 05.07.18
 * Time: 14:59
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register(){
        $this->app->bind('App\\Repositories\\IBidRepository', 'App\\Repositories\\BidRepository');
    }
}