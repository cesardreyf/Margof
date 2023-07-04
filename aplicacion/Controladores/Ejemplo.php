<?php

namespace Controlador;

use Controlador\Base\Controlador;

class Ejemplo extends Controlador
{

    public function indice()
    {
        $this->datos()->web()->titulo('Página principal');

        $this->datos()->definir('titulo', 'Título de Ejemplo');
        $this->datos()->definir('ejemplo', 'Lorem ipsum dolorem sit amet');

        $this->datos['footer_descripcion'] = 'footer';
        $this->datos['derechos'] = 'Derechos reservados - 2023';

        $this->vista()->plantilla('index');
    }

}
