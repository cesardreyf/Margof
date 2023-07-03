<?php

namespace Controlador\Base\Traits;

use Vista\Interfaz\Render;
use Vista\Simple\Render as VistaSimple;

/**
 * Agrega un método para acceder al render
 *
 * @package Controlador\Base\Traits
 */
trait Vista
{
    /**
     * Instancia del render
     *
     * @var Render
     */
    private Render $vista;

    /**
     * Obtiene el render
     *
     * @return Render
     */
    public function vista(): Render
    {
        return $this->vista ?? $this->vista = new VistaSimple();
    }

}
