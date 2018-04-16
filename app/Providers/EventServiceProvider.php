<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\PedirParaColetarTemperatura' =>[
            'App\Listeners\ColetarTemperatura',
        ],
        'App\Events\PedirParaColetarUmidade' =>[
            'App\Listeners\ColetarUmidade',
        ],
        'App\Events\PedirParaColetarPressao' =>[
            'App\Listeners\ColetarPressao',
        ],
        'App\Events\PedirParaColetarAltitude' =>[
            'App\Listeners\ColetarAltitude',
        ],        
        'App\Events\EnviarAlerta' =>[
            'App\Listeners\EmailAlerta',
        ],
        'App\Events\EnviarRelatorio' =>[
            'App\Listeners\EmailRelatorio',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
