<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        //App\Model::class => App\Policies\UserPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $permissions = Permission::with('roles')->get();
        $roles = Role::all();

        foreach ($permissions as $permission) {
            Gate::define($permission->name, function ($user) use ($permission) {
                return $user->hasPermission($permission);
            });
        }

        foreach ($roles as $role) {
            Gate::define($role->name, function ($user) use ($role) {
                foreach ($user->roles as $role_user) {

                    return $role->name == $role_user->name;
                }
            });
        }

        Gate::before(function (User $user, $ability){
            if($user->hasAnyRoles('adm')){
                return true;
            }
        });
    }
}
