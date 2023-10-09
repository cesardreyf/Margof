<?php

namespace Inter;

use Configuracion\Session as Configuracion;
use Gof\Sistema\MVC\Aplicacion\DAP\DAP;
use Gof\Sistema\MVC\Interfaz\Ejecutable;

/**
 * Inter encargado de gestionar la gestión de las sesiones
 *
 * @package Inter
 */
class InterSession implements Ejecutable
{

    /**
     * Inicializa la configuración del gestor de sesión
     *
     * @param Gof\Sistema\MVC\Aplicacion\DAP\N2 $app Instancia del DAP.
     */
    public function ejecutar(DAP $app)
    {
        $session = $app->session();
        $session->opciones(Configuracion::OPCIONES);
        $session->configuracion()->definir(Configuracion::CONFIGURACION);
    }

}
