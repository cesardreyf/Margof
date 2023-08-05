<?php

namespace Configuracion;

use Gof\Sistema\MVC\Rutas\Configuracion;
use Gof\Sistema\MVC\Rut\Rut;
use Gof\Sistema\MVC\Sistema;

/**
 * Configuración del enrutador
 *
 * @package Margof\Configuracion
 */
class Enrutador extends Configuracion
{

    /**
     * Constructor
     */
    public function __construct(Sistema $sistema)
    {
        $this->enrutador = new Rut($sistema);
        new Rutas($this->enrutador->rutas());
    }

}
