<?php

namespace Configuracion\Rutas\Simple;

use Gof\Sistema\MVC\Rutas\Simple\Datos;

/**
 * Configuración para el enrutador simple
 *
 * @package Configuracion\Rutas\Simple
 */
class Rutas extends Datos
{
    /**
     * Clave a ser usada con la variable super global: $_GET
     *
     * Clave que será usada para obtener la consulta.
     *
     * @var string
     */
    public string $claveGet = '__peticion';

    /**
     * Nombre del controlador principal
     *
     * @var string
     */
    public string $paginaPrincipal = 'index';

    /**
     * Nombre del controlador para los errores 404
     *
     * @var string
     */
    public string $paginaError404 = 'e404';

    /**
     * Caracter que será tenido en cuenta como separador en la consulta
     *
     * @var string
     */
    public string $separador = '/';

    /**
     * Lista de controladores públicos
     *
     * Lista con los nombres de los controladores disponibles
     *
     * @var array
     */
    public array $paginasDisponibles = [
        'index',
        'ejemplo',
    ];
}
