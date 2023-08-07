<?php

namespace Inter;

use Gof\Sistema\MVC\Aplicacion\DAP\DAP;
use Gof\Sistema\MVC\Interfaz\Ejecutable;
use Vista\Interfaz\Render;
use Vista\Simple\Render as VistaSimple;

/**
 * Inter encargado de agregar el motor de plantillas por defecto a la app
 *
 * @package Inter
 */
class Vista implements Ejecutable
{

    /**
     * Agrega el motor de plantilla a la app
     *
     * @param Gof\Sistema\MVC\Aplicacion\DAP\N2 $app Instancia del DAP.
     */
    public function ejecutar(DAP $app)
    {
        $app->agregar(Render::class, function() {
            return new VistaSimple();
        });

        // Asocia el método vista a la app
        $app->asociarMetodo('vista', Render::class);
    }

}
