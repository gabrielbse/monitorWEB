<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EnviarAlerta extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    protected $natureza ="";
    protected $valorLimite=0;
    protected $tipo="acima";
    protected $atual="0";
    public function __construct($natureza, $valorLimite, $tipo, $atual)
    {
        $this->natureza = $natureza;
        $this->valorLimite = $valorLimite;
        $this->tipo = $tipo;
        $this->atual = $atual;
    }
    public function getNatureza()
    {
        return $this->natureza;
    }

    public function getValorLimite()
    {
        return $this->valorLimite;
    }

    public function getTipo()
    {
        return $this->tipo;
    }
    public function getAtual()
    {
        return $this->atual;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
