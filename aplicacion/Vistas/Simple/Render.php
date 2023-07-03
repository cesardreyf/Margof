<?php

namespace Vista\Simple;

use Closure;
use Gof\Datos\Archivos\Archivo;
use Gof\Interfaz\Archivos\Carpeta;
use Vista\Interfaz\Render as IRender;

/**
 * Render simple para renderizar plantillas
 *
 * Simple motor de plantillas que carga los archivos y les pasa un array de datos.
 *
 * @package Vista\Simple
 */
class Render implements IRender
{
    /**
     * Almacena el nombre de la plantilla
     *
     * @var string
     */
    private string $plantilla;

    /**
     * Almacena la ruta de la carpeta donde buscará la plantilla
     *
     * @var ?string
     */
    private ?string $carpeta = null;

    /**
     * Almacena los datos que serán enviados a la plantilla al momento de renderizar
     *
     * @var array
     */
    private array $datos = [];

    /**
     * Almacena la extensión por defecto de las plantillas
     *
     * @var string
     */
    public string $extension = '.html';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->carpeta = dirname(__DIR__) . '/Html/';
    }

    /**
     * Define la carpeta donde se buscarán las plantillas
     *
     * @param Carpeta $carpeta
     */
    public function carpeta(Carpeta $carpeta)
    {
        $this->carpeta = $carpeta->ruta();
    }

    /**
     * Renderiza la plantilla
     *
     * Renderiza de la forma más simple: incluye el archivo.
     *
     * @return bool Devuelve **true** si renderizó correctamente o **false** de lo contrario.
     */
    public function renderizar(): bool
    {
        if( is_null($this->carpeta) || empty($this->plantilla) ) {
            return false;
        }

        $plantilla = new Archivo($this->carpeta . $this->plantilla . $this->extension);
        $plantilla = $plantilla->ruta();
        $data = (object)$this->datos;

        Closure::bind(function($plantilla) {
            include($plantilla);
        }, $data)($plantilla);

        return true;
    }

    /**
     * Establece la plantilla a ser renderizada
     *
     * @param string $nombre Nombre de la plantilla
     */
    public function plantilla(string $nombre)
    {
        $this->plantilla = $nombre;
    }

    /**
     * Define el array de datos que será pasado a la plantilla
     *
     * @param array &$datos Array de datos
     */
    public function datos(array &$datos)
    {
        $this->datos =& $datos;
    }

}
