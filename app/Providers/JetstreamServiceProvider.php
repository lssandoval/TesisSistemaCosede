<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;
use App\Models\Nuevat;
use App\Policies\NuevatPolicy;

class JetstreamServiceProvider extends ServiceProvider
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

    public function username()
    {
        return 'username';
    }

    public function boot(): void
    {
        $this->configurePermissions();
        
        Fortify::authenticateUsing(function ($request) {
            $validated = Auth::validate([
                'samaccountname' => $request->username, 'password' => $request->password
            ]);
            return $validated ? Auth::getLastAttempted() : null;
        });

        Jetstream::deleteUsersUsing(DeleteUser::class);

        // Registrar políticas
        Gate::policy(Nuevat::class, NuevatPolicy::class);
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
