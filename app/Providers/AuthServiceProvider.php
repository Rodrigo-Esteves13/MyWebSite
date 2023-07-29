<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Project;
use App\Policies\ProjectPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Project::class => ProjectPolicy::class,
    ];
    

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

     public function boot()
     {
         $this->registerPolicies();
     
         Gate::define('create-project', function ($user) {
             return $user->isAdmin();
         });
     }
}
