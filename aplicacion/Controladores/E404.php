<?php

namespace Controlador;

use Controlador\Base\Controlador;

class E404 extends Controlador
{

    public function indice()
    {
        http_response_code(404);
    }

}
