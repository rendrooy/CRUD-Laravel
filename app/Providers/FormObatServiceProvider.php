<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Jenis;
use App\Perusahaan;

class FormObatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('obat.form', function($view) {
            $view->with('list_jenis', Jenis::pluck('nama_jenis', 'id'));
            $view->with('list_perusahaan', Perusahaan::pluck('nama_perusahaan', 'id'));
        });

        view()->composer('obat.form_pencarian', function($view) {
             $view->with('list_jenis', Jenis::pluck('nama_jenis', 'id'));
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
