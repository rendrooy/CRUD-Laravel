<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ObatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = '';

        if (request()->segment(1) == 'obat') {
            $halaman = 'obat';
        }

        if (request()->segment(1) == 'about') {
            $halaman = 'about';
        }

        if (request()->segment(1) == 'jenis') {
            $halaman = 'jenis';
        }

        if (request()->segment(1) == 'perusahaan') {
            $halaman = 'perusahaan';
        }

        if (request()->segment(1) == 'user') {
            $halaman = 'user';
        }

        view()->share('halaman', $halaman);
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
