<?php

namespace Configuracion;

use Gof\Interfaz\Lista;

/**
 * Lista de inters que se ejecutarán antes de los controladores
 *
 * @package Margof\Configuracion
 */
class Inters implements Lista
{

    /**
     * Lista de inters
     *
     * @return array
     */
    public function lista(): array
    {
        return [
        ];
    }

}
