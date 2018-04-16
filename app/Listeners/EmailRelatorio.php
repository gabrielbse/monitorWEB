<?php

namespace App\Listeners;

use App\Events\EnviarRelatorio;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use SnappyPDF;
use Carbon\Carbon;
use Mail;
use Auth;
use App\User;
use App\Temperatura;
use App\Pressao;
use App\Umidade;
use App\Altitude;
use App\Logs;

class EmailRelatorio
{

    public function __construct()
    {
        
    }
    
    public function handle(EnviarRelatorio $event)
    {
        $tempo = new Carbon();        
        $tempo = $tempo->format('d-m-Y H-i-s');

        $tempo_registros = Carbon::yesterday();

        $temperatura = Temperatura::where('relatado', 'false')->orderBy('created_at', 'desc')->get();
        $pressao = Pressao::where('relatado', 'false')->orderBy('created_at', 'desc')->get();
        $altitude = Altitude::where('relatado', 'false')->orderBy('created_at', 'desc')->get();
        $umidade = Umidade::where('relatado', 'false')->orderBy('created_at', 'desc')->get();


        $user = Auth::user();
        $footer = \View::make('pdfs.footerRelatorioPdf')->render();
        $header = \View::make('pdfs.headerRelatorioPdf')->render();
        $pdf = SnappyPDF::loadView('pdfs.relatorioPdf',compact('temperatura', 'pressao', 'umidade', 'altitude'))->setPaper('a4')->setOption('header-html',$header)->setOption('footer-html',$footer);
        $tempo = new Carbon();
        $tempo = $tempo->format('d-m-Y H-i-s');
        $local = 'app\public\relatorio - ' . $tempo . '.pdf';
        $pdf->save(storage_path($local));

        foreach ($temperatura as $temp) {
            $temp->relatado = true;
            $temp->save();
        }
        foreach ($pressao as $pres) {
            $pres->relatado = true;
            $pres->save();
        }
        foreach ($altitude as $alt) {
            $alt->relatado = true;
            $alt->save();
        }
        foreach ($umidade as $umi) {
            $umi->relatado = true;
            $umi->save();
        }
        $file = storage_path($local);
        if( file_exists($file) ){
            Mail::send('emails.emailRelatorio', ['user' => $user, 'file' => $file], function ($m) use ($user, $file) {
                $m->to($user->email, $user->nome)->subject('Aviso - MonitorWEB!');
                $m->attach($file);
            });
            $log = new Logs();
            $log->acao = "Relatório enviado com sucesso";
            $log->flag_envio = 1;
            $log->save();
        }
    }
}
