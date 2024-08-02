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
use Laravel\Fortify\Http\Requests\LoginRequest;

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
    public function boot(): void
    {
        $this->configurePermissions();

        Fortify::authenticateUsing(function (LoginRequest $request) {
            // Intentar obtener las credenciales desde las cookies
            $username = $request->cookie('custom_username');
            $password = $request->cookie('custom_password');

            // Si las cookies están presentes, intentar autenticación con ellas
            if ($username && $password) {
                $validated = Auth::validate([
                    'samaccountname' => $username,
                    'password' => $password,
                ]);
                if ($validated) {
                    return Auth::getLastAttempted();
                }
            }

            // Si las cookies no están presentes, usar los datos del formulario
            $validated = Auth::validate([
                'samaccountname' => $request->username,
                'password' => $request->password,
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
