<?php

namespace Configuracion;

use Controlador;
use Gof\Gestor\Enrutador\Rut\Interfaz\Ruta;
use Inter;

/**
 * Define las rutas accesibles
 *
 * @package Margof\Configuracion
 */
class Rutas
{

    /**
     * Constructor
     *
     * Recibe una instancia de la ruta padre donde agregar las rutas hijas.
     *
     * @param Ruta $rutas
     */
    public function __construct(Ruta $rutas)
    {
        $this->paginaInexistente($rutas);
        $this->paginaPrincipal($rutas);

        // $rutas->agregar('ruta', Controlador::class);
    }

    public function paginaInexistente(Ruta $rutas)
    {
        $rutas->inexistente(Controlador\E404::class);
    }

    public function paginaPrincipal(Ruta $rutas)
    {
        $index = $rutas->agregar('', Controlador\Index::class);
        $index->alias('index');
    }

}
