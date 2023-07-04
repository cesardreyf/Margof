<?php

namespace Controlador\Base\Traits;

use Mi\Datos\Gestor;
use Vista\Interfaz\Render;

trait Datos
{
    /**
     * Almacena el gestor de datos del controlador
     *
     * @var Gestor
     */
    protected Gestor $gestorDeDatos;

    abstract public function vista(): Render;

    /**
     * Obtiene el gestor de datos
     *
     * @return Gestor
     */
    public function datos(): Gestor
    {
        return $this->gestorDeDatos ?? $this->gestorDeDatos = new Gestor($this->vista()->datosRef());
    }

}
