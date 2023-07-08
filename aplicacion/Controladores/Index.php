<?php

namespace Controlador;

use Controlador\Base\Controlador;

class Index extends Controlador
{

    public function indice()
    {
        echo 'ta andando';
        $this->datos()->web()->titulo('Página principal');
    }

}
