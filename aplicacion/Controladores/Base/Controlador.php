<?php

namespace Controlador\Base;

use Gof\Sistema\MVC\Interfaz\Ejecutable;

/**
 * Clase abstracta para los controladores
 *
 * @package Margof\Controlador\Base
 */
abstract class Controlador implements Ejecutable
{
    abstract public function ejecutar($app);
}
