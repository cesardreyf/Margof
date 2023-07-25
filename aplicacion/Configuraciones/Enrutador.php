<?php

namespace Configuracion;

use Gof\Gestor\Enrutador\Rut\Enrutador as Rut;
use Gof\Sistema\MVC\Rutas\Configuracion;

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
    public function __construct()
    {
        $this->enrutador = new Rut();
        new Rutas($this->enrutador->rutas());
    }

}
