<?php

namespace App\Providers;
use App\Models\UserStatus;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        $usuariosEnLineaIds = UserStatus::where('is_online', true)->pluck('user_id');
        $usuariosEnLinea = User::whereIn('id', $usuariosEnLineaIds)->get();

        // Compartir la variable con todas las vistas
        View::share('usuariosEnLinea', $usuariosEnLinea);
    }
}
