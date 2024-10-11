<?php

namespace App\Domain\Common\Providers;

use App\Domain\Accountancy\Models\Cnae;
use App\Domain\Accountancy\Models\Crt;
use App\Domain\Common\Models\Contribution;
use App\Domain\Common\Models\Person;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class PersonServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events, Request $request)
    {
        View::composer([
            'components.admin.company.company-form',
            'components.register.customer.customer-form',
            'components.register.provider.provider-form',
            'components.register.professional.professional-form',
            'components.register.transport-company.transport-company-form'
        ], function ($view) use ($request) {
            $view->contributions = Contribution::select('id AS value', 'description')->get()->toArray();
            $view->cnaes = Cnae::select('id AS value', 'description')->get()->toArray();
            $view->crts = Crt::select('id AS value', 'description')->get()->toArray();
            $view->environments = [
                ['value' => Person::ENVIRONMENT_SANDBOX, 'description' => __('strings.sandbox')],
                ['value' => Person::ENVIRONMENT_HOMO, 'description' => __('strings.homo')],
                ['value' => Person::ENVIRONMENT_PROD, 'description' => __('strings.prod')]
            ];
            $view->persontypes = [
                ['value' => Person::PERSON_TYPE_PHYSICAL_PERSON, 'description' => __('strings.physical_person')],
                ['value' => Person::PERSON_TYPE_LEGAL_PERSON, 'description' => __('strings.legal_person')]
            ];
        });
    }
}
