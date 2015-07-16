<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('domain', function ($attribute, $value) {
            $domainRegexp = "^((?! -)[A-Za-z0-9-]{1,63}(?<!-)\\.)+[A-Za-z]{2,6}$^";
            return (bool) preg_match($domainRegexp, $value);
        });

        /**
         * Counts the number of records that have the same value in the given attribute
         * and returns false if that number is equal or exceds the given on
         * @param string ?(connection).table
         * @param string column
         * @param int count
         */
        Validator::extend('count', function ($attribute, $value, $parameters) {
            $table = $parameters[0];
            list($connection, $table) = Str::contains($table, '.') ? explode('.', $table, 2) : [null, $table];

            $count = \DB::connection($connection)->table($table)
                ->where($parameters[1], $value)
                ->count();

            return $parameters[2] <= $count;

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
