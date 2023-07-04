<?php

namespace Mi\Datos;

use Configuracion\Web as DatosWeb;

/**
 * Gestor de datos web
 *
 * Módulo encargado de obtener y definir los valores de los datos de la web.
 *
 * @package Mi\Datos
 */
class Web
{
    /**
     * @var ?array Puntero a los datos
     */
    private ?array $datos;

    /**
     * Constructor
     *
     * @param array &$datos Referencia al array de datos
     */
    public function __construct(array &$datos)
    {
        $this->datos =& $datos['web'];

        // Temporal...
        $this->datos = (array)(new DatosWeb());
    }

    /**
     * Obtiene o define el título de la web
     *
     * @param ?string $titulo Título de la página o **null** para obtener el actual.
     *
     * @return string Devuelve el título actual.
     */
    public function titulo(?string $titulo = null): string
    {
        return is_null($titulo) ? $this->datos['titulo'] : $this->datos['titulo'] = $titulo;
    }

    /**
     * Obtiene o define el nombre de la web
     *
     * @param ?string $nombre Nombre de la web o **null** para obTENER el actual.
     *
     * @return string Devuelve el nombre actual.
     */
    public function nombre(?string $nombre = null): string
    {
        return is_null($nombre) ? $this->datos['nombre'] : $this->datos['nombre'] = $nombre;
    }

    /**
     * Obtiene o define la dirección de la web
     *
     * @param ?string $direccion Dirección web raíz o **null** para obtener el actual.
     *
     * @return string Devuelve la dirección web actual.
     */
    public function direccion(?string $direccion = null): string
    {
        return is_null($direccion) ? $this->datos['direccion'] : $this->datos['direccion'] = $direccion;
    }

    /**
     * Obtiene o define la codificación de la web
     *
     * @param ?string $charset Codificación de la página o **null** para obtener el actual.
     *
     * @return string Devuelve la codificación actual.
     */
    public function charset(?string $charset = null): string
    {
        return is_null($charset) ? $this->datos['charset'] : $this->datos['charset'] = $charset;
    }

    /**
     * Obtiene o define el lenguaje de la web
     *
     * @param ?string $lenguaje Lenguaje de la página o **null** para obtener el actual.
     *
     * @return string Devuelve el lenguaje actual.
     */
    public function lenguaje(?string $lenguaje = null): string
    {
        return is_null($lenguaje) ? $this->datos['lenguaje'] : $this->datos['lenguaje'] = $lenguaje;
    }

}
