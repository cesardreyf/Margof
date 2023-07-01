<?php

namespace Controlador;

use Controlador\Base\Controlador;

class E404 extends Controlador
{

    public function indice()
    {
        echo 'Error: página inexistente';
        http_response_code(404);
    }

}
