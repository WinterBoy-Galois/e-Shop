<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
         /**
          * Only site admins
          * and authors
          * can access site 
          * menu
         */
        Gate::define('access-sitemenu',function($user){
            return $user->hasAnyRoles(['admin','author']);
        });
         /**
          * Only site admins 
          *can manage users
         */
        Gate::define('manage-users',function($user){
            return $user->hasRole('admin');
        });

       /* Gate::define('edit-users',function($user){
            return $user->hasRole('admin');
        });

        Gate::define('delete-users',function($user){
            return $user->hasRole('admin');
        });*/
         /**
          * Only site admins 
          *can access application 
          *dashboard
         */
        Gate::define('access-dashboard',function($user){
            return $user->hasRole('admin');
        });
         /**
          * Only site admins 
          *and authors can 
          *manage products 
         */
        Gate::define('manage-products',function($user){
            return $user->hasAnyRoles(['admin','author']);
        });

    }
}
