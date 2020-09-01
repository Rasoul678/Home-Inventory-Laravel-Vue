<?php

namespace App\Providers;

use App\Address;
use App\Company;
use App\Item;
use App\Policies\AddressPolicy;
use App\Policies\CompanyPolicy;
use App\Policies\ItemPolicy;
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
        Item::class => ItemPolicy::class,
        Address::class => AddressPolicy::class,
        Company::class => CompanyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
