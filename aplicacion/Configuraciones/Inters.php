<?php

namespace Configuracion;

use Gof\Interfaz\Lista;
use Inter;

/**
 * Lista de inters que se ejecutarán antes de los controladores
 *
 * @package Margof\Configuracion
 */
class Inters implements Lista
{

    /**
     * Lista de inters que se ejecutarán antes del controlador
     *
     * Todos los inters aquí definidos se ejecutarán independientemente de los
     * inters declarados de cada ruta y antes que ellos.
     *
     * NOTA: El orden de definición es importante.
     *
     * @return Gof\Sistema\MVC\Interfaz\Ejecutable[]
     */
    public function lista(): array
    {
        return [
            new Inter\InterSession(),
            new Inter\InterCookies(),
            new Inter\InterVista(),
            new Inter\InterDatos(),
        ];
    }

}
