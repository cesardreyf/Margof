<?php

namespace Configuracion;

use Controlador;
use Gof\Contrato\Enrutador\Enrutador as Gestor;
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
     * Clave del cual se obtendrá la solicitud de las rutas mediante _GET
     *
     * @var string
     */
    public string $urlClave = '__peticion';

    /**
     * Caracter empleado por el enrutador para dividir la solicitud
     *
     * @var string
     */
    public string $separador = '/';

    /**
     * Controlador principal
     *
     * @var string
     */
    public string $controladorPrincipal = Controlador\Index::class;

    /**
     * Controlador para páginas inexistentes
     *
     * @var string
     */
    public string $controladorE404 = Controlador\E404::class;

    /**
     * Gestor encargado de procesar la solicitud y generar el controlador a ejecutarse
     *
     * @var Gestor
     */
    public Gestor $enrutador;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->enrutador = new Rut(
            $this->controladorPrincipal,
            $this->controladorE404
        );

        new Rutas($this->enrutador->rutas());
    }

}
