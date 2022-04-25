<?php

namespace App\Providers;
use Laravel\Passport\Passport;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Passport::tokensCan([
            'corporativos' => 'Gestionar todo lo relacinado con corporativos',
            'empresas-corporativos' => 'Gestionar las empresas de un corporativo',
            'contactos-corporativos' => 'Gestionar los contactos de un corporativo',
            'contratos-corporativos' => 'Gestionar los contratos de un corporativo',
            'documentos' => 'Gestionar todos los documentos',
            'documentos-corporativos' => 'Gestionar todos los documentos de un corporativo',
            'usuarios' => 'Gestionar toda los usuarios',
            
        ]);
        Passport::setDefaultScope([
            'usuarios',
        ]);

        //
    }
}
