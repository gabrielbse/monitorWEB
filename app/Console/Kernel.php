<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Event;
use App\Events\PedirParaColetarTemperatura;
use App\Events\PedirParaColetarPressao;
use App\Events\PedirParaColetarUmidade;
use App\Events\PedirParaColetarAltitude;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $teste = Event::fire(new PedirParaColetarTemperatura());
        })->cron('* * * * * *');

        $schedule->call(function () {
            $teste = Event::fire(new PedirParaColetarPressao());
        })->cron('* * * * * *');

        $schedule->call(function () {
            $teste = Event::fire(new PedirParaColetarUmidade());
        })->cron('* * * * * *');

        $schedule->call(function () {
            $teste = Event::fire(new PedirParaColetarAltitude());
        })->cron('* * * * * *');
    }
}
