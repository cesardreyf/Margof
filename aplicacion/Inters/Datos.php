<?php

namespace Inter;

use Gof\Sistema\MVC\Aplicacion\DAP\DAP;
use Gof\Sistema\MVC\Interfaz\Ejecutable;
use Mi\Datos\Gestor;

/**
 * Inter encargado de agregar el gestor de datos a la app
 *
 * @package Inter
 */
class Datos implements Ejecutable
{

    /**
     * Agrega el gestor de datos a la app
     *
     * @param Gof\Sistema\MVC\Aplicacion\DAP\N2 $app Instancia del DAP.
     */
    public function ejecutar(DAP $app)
    {
        $app->agregar(Gestor::class, function() use ($app) {
            return new Gestor($app->vista()->datosRef());
        });

        // Asocia el método datos a la app
        $app->asociarMetodo('datos', Gestor::class);
    }

}
