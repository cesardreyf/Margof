<?php

namespace Controlador;

use Controlador\Base\Controlador;

class Index extends Controlador
{

    public function indice()
    {
        $this->cookies()->duracion(time() + 120);
        $this->cookies()->definir('algo', 'bobo');

        $this->session()->definir('otro', 'bobo');

        $this->datos['web']['nombre'] = 'Margof';
        $this->datos['titulo'] = 'Un título de ejemplo';
        $this->datos['descripcion'] = 'Esto es solo un ejemplo de plantilla renderizable por el motor de plantillas Simple.';
        $this->datos['footer'] = 'Derechos Expirados - 2023';
        $this->vista()->plantilla('ejemplo');
    }

}
