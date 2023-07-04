<?php

namespace Controlador;

use Controlador\Base\Controlador;

class E404 extends Controlador
{

    public function indice()
    {
        $this->datos()->web()->titulo('Página inexistente');
        http_response_code(404);
    }

}
