<?php

namespace App\Providers\Permissions;

use Gate;
use App\Models\Permission;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    //     Permission::get()->map(function ($permission) {
    //         Gate::define($permission->name, function ($user) use ($permission) {
    //             return $user->hasPermissionTo($permission);
    //         });
    //     });
    }
}
