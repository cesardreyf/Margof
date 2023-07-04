<?php

namespace Configuracion;

/**
 * Establece los datos principales para la web
 *
 * @package Configuracion
 */
class Web
{
    /**
     * @var string Nombre de la web
     */
    public string $nombre = 'Nombre del Proyecto';

    /**
     * @var string Dirección web del dominio
     */
    public string $direccion = 'http://dominio.com';

    /**
     * @var string Título por defecto
     */
    public string $titulo = 'Sin título';

    /**
     * @var string Codificación
     */
    public string $charset = 'UTF-8';

    /**
     * @var string
     */
    public string $lenguaje = 'es';
}
