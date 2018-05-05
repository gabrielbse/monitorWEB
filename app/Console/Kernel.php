<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Event;
use App\Events\PedirParaColetarTemperatura;
use App\Events\PedirParaColetarPressao;
use App\Events\PedirParaColetarUmidade;
use App\Events\PedirParaColetarAltitude;
use App\Events\EnviarRelatorio;
use App\Configuracoes;

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
        /*$config = Configuracoes::select('intervalo_coleta')->first();
        if($config->intervalo_coleta == 5){
            $schedule->call(function () {
            $teste = Event::fire(new PedirParaColetarTemperatura());
            })->everyFiveMinutes();

            $schedule->call(function () {
                $teste = Event::fire(new PedirParaColetarPressao());
            })->everyFiveMinutes();

            $schedule->call(function () {
                $teste = Event::fire(new PedirParaColetarUmidade());
            })->everyFiveMinutes();

            $schedule->call(function () {
                $teste = Event::fire(new PedirParaColetarAltitude());
            })->everyFiveMinutes();
        }elseif($config->intervalo_coleta == 10){
            $schedule->call(function () {
            $teste = Event::fire(new PedirParaColetarTemperatura());
            })->everyTenMinutes();

            $schedule->call(function () {
                $teste = Event::fire(new PedirParaColetarPressao());
            })->everyTenMinutes();

            $schedule->call(function () {
                $teste = Event::fire(new PedirParaColetarUmidade());
            })->everyTenMinutes();

            $schedule->call(function () {
                $teste = Event::fire(new PedirParaColetarAltitude());
            })->everyTenMinutes();
        }else{
            $schedule->call(function () {
            $teste = Event::fire(new PedirParaColetarTemperatura());
            })->everyThirtyMinutes();

            $schedule->call(function () {
                $teste = Event::fire(new PedirParaColetarPressao());
            })->everyThirtyMinutes();

            $schedule->call(function () {
                $teste = Event::fire(new PedirParaColetarUmidade());
            })->everyThirtyMinutes();

            $schedule->call(function () {
                $teste = Event::fire(new PedirParaColetarAltitude());
            })->everyThirtyMinutes();
        }

        //Relatório
        if($config->intervalo_relatorio == 1){
            $schedule->call(function () {
                $teste = Event::fire(new EnviarRelatorio());
            })->daily();
        }elseif($config->intervalo_relatorio == 7){
            $schedule->call(function () {
                $teste = Event::fire(new EnviarRelatorio());
            })->weekly();
        }else{
            $schedule->call(function () {
                $teste = Event::fire(new EnviarRelatorio());
            })->monthly(); 
        }*/
               
    }
}