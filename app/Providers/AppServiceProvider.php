<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interface\CustomerRepositoryInterface;
use App\Repositories\CustomerRepository;
use App\Repositories\Interface\VehicleRepositoryInterface;
use App\Repositories\VehicleRepository;
use App\Repositories\Interface\VehicleBrandRepositoryInterface;
use App\Repositories\VehicleBrandRepository;
use App\Repositories\Interface\VehicleColorRepositoryInterface;
use App\Repositories\VehicleColorRepository;
use App\Repositories\Interface\ReqServiceRepositoryInterface;
use App\Repositories\ReqServiceRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(VehicleBrandRepositoryInterface::class, VehicleBrandRepository::class);
        $this->app->bind(VehicleColorRepositoryInterface::class, VehicleColorRepository::class);
        $this->app->bind(VehicleRepositoryInterface::class, VehicleRepository::class);
        $this->app->bind(ReqServiceRepositoryInterface::class, ReqServiceRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
