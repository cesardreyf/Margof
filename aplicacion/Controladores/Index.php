<?php

namespace Controlador;

use Controlador\Base\Controlador;

class Index extends Controlador
{

    public function indice()
    {
        $this->datos()->web()->titulo('Página principal');
    }

}
