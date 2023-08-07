<?php

namespace Controlador\Base;

use Gof\Sistema\MVC\Interfaz\Ejecutable;

/**
 * Clase abstracta para los controladores
 *
 * Esta abstracción solo es útil para no tener que declarar el espacio de nombre
 * tan largo del ejecutable del sistema mvc ni tampoco el DAP.
 *
 * NOTA: Esta declaración hace que el método ejecutar reciba un valor "mixed".
 * Pero no debería ser. Puede que en el futuro sea removido o cambiado para
 * garantizar la firma real de la interfaz Ejecutable.
 *
 * @package Margof\Controlador\Base
 */
abstract class Controlador implements Ejecutable
{
    abstract public function ejecutar($app);
}
