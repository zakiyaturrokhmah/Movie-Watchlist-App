<?php

namespace App\Providers;

use App\Models\Film;
use App\Models\Watchlists;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('dashboard', function ($view) {
            $films = Film::all();
            $watchlist = Watchlists::where('id_pengguna', request()->cookie('id_pengguna'))->get();

            $watchlistFormat = $watchlist->map(function ($watchlist) {
                $film = Film::where('id_film', $watchlist->id_film)->first();
                $watchlist->film = $film; // Attach the film details to the watchlist entry
                return $watchlist;
            });

            $view->with(compact('films', 'watchlistFormat'));
        });
    }
}
