<?php

namespace Configuracion;

use Gof\Gestor\Url\Amigable\GestorUrl;
use Gof\Sistema\MVC\Peticiones\Configuracion;

/**
 * Datos de configuración para el módulo de peticiones del sistema mvc
 *
 * @package Margof\Configuracion
 */
class Peticiones extends Configuracion
{
    /**
     * Clave del array _GET desde donde se obtendrá la solicitud
     *
     * @var string
     */
    public string $url = '__peticion';

    /**
     * Caracter usado para dividir la solicitud en recursos/rutas solicitadas
     *
     * @var string
     */
    public string $separador = '/';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gestor = new GestorUrl($this->separador);
    }

}
