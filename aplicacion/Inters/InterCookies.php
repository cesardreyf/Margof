<?php

namespace Inter;

use Configuracion\Cookies as Configuracion;
use Gof\Sistema\MVC\Aplicacion\DAP\DAP;
use Gof\Sistema\MVC\Interfaz\Ejecutable;

/**
 * Inter encargado de gestionar la gestión de las cookies
 *
 * @package Inter
 */
class InterCookies implements Ejecutable
{

    /**
     * Inicializa la configuración del gestor de cookies
     *
     * @param Gof\Sistema\MVC\Aplicacion\DAP\N2 $app Instancia del DAP.
     */
    public function ejecutar(DAP $app)
    {
        $cookies = $app->cookies();
        $cookies->duracion(Configuracion::DURACION);
        $cookies->ruta(Configuracion::PATH);
        $cookies->dominio(Configuracion::DOMAIN);
        $cookies->seguridad(Configuracion::SECURE);
        $cookies->solohttp(Configuracion::HTTPONLY);
    }

}
