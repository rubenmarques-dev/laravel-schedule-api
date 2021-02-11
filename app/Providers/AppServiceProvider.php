<?php

namespace App\Providers;

use App\Models\Meeting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('date_not_between', function ($attribute, $value) {

            $total = Meeting::where('start_date', '<=', $value)
                ->where('end_date', '>=', $value)->get()->count();

            Log::info($total);
            return $total === 0;
        }, 'start date wrong');
    }
}
