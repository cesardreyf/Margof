<?php

namespace Controlador\Base\Traits;

use Gof\Gestor\Redireccion\Redirigir as GestorDeRedireccion;

trait Redirigir
{
    /**
     * Almacena una instancia del gestor de redirección
     *
     * @var ?GestorDeRedireccion
     */
    private ?GestorDeRedireccion $redirigir = null;

    /**
     * Obtiene el gestor de redirección
     *
     * @return GestorDeRedireccion
     */
    public function redirigir(): GestorDeRedireccion
    {
        return $this->redirigir ?? $this->redirigir = new GestorDeRedireccion();
    }

}
