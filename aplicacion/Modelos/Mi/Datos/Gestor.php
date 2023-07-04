<?php

namespace Mi\Datos;

use Gof\Interfaz\Lista;

/**
 * Gestor de datos para la vista
 *
 * Gestiona los datos que serán enviados a la vista
 *
 * @package Mi\Datos
 */
class Gestor implements Lista
{
    /**
     * @var array Puntero a los datos de la vista
     */
    private array $datos;

    /**
     * @var ?Web
     */
    private ?Web $web;

    /**
     * Constructor
     *
     * @param array &$datos Referencia al array de datos del render
     */
    public function __construct(array &$datos)
    {
        $this->datos =& $datos;
        $this->web = new Web($this->datos);
    }

    /**
     * Define un elemento del array de datos
     *
     * @param string $clave Clave asociada.
     * @param mixed  $valor Valor.
     *
     * @return mixed Devuelve el mismo valor agregado.
     */
    public function definir(string $clave, mixed $valor): mixed
    {
        return $this->datos[$clave] = $valor;
    }

    /**
     * Obtiene el valor de un elemento del array de datos
     *
     * @param string $clave Clave asociada
     *
     * @return Devuelve el valor del elemento o **null** si no existe.
     */
    public function obtener(string $clave): mixed
    {
        return $this->datos[$clave] ?? null;
    }

    /**
     * Obtiene una referencia a un elemento asociado a una clave
     *
     * @param string $clave Clave asociada.
     *
     * @return mixed
     */
    public function& obtenerReferencia(string $clave): mixed
    {
        return $this->datos[$clave];
    }

    /**
     * Obtiene el módulo encargado de los datos de la web
     *
     * @return Web
     */
    public function web(): Web
    {
        return $this->web;
    }

    /**
     * Lista de datos
     *
     * @return array
     */
    public function lista(): array
    {
        return $this->datos;
    }

}
