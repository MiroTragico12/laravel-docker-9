<?php

namespace App\Providers;

use App\Http\Controllers\Api\LocalizacaoController;
use App\Models\Explorador;
use App\Observers\ExploradorObserver;
use App\Repositories\ExploradorRepositoryInterface;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ExploradorEloquentORM;
use App\Repositories\InventarioEloquentORM;
use App\Repositories\InventarioRepositoryInterface;
use App\Repositories\ItemEloquentORM;
use App\Repositories\ItemRepositoryInterface;
use App\Repositories\LocalizacaoEloquentORM;
use App\Repositories\LocalizacaoRepositoryInterface;
use App\Repositories\TrocaEloquentORM;
use App\Repositories\TrocaRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ExploradorRepositoryInterface::class, ExploradorEloquentORM::class);
        $this->app->bind(InventarioRepositoryInterface::class, InventarioEloquentORM::class);
        $this->app->bind(ItemRepositoryInterface::class, ItemEloquentORM::class);
        $this->app->bind(LocalizacaoRepositoryInterface::class, LocalizacaoEloquentORM::class);
        $this->app->bind(TrocaRepositoryInterface::class, TrocaEloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Explorador::observe(ExploradorObserver::class); 
    }
}
