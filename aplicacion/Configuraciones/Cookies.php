<?php

namespace Configuracion;

/**
 * Almacena los datos de configuración del gestor de cookies
 *
 * Almacena los datos que serán pasados al constructor del gestor de cookies
 * para establecer los valores por defecto al momento de enviar cookies.
 *
 * @package Configuracion
 */
abstract class Cookies
{
    /**
     * Duración por defecto de todas las cookies
     *
     * Valor por defecto de la propiedad 'expire' de las cookies.
     *
     * @var int
     */
    public const DURACION = 120;

    /**
     * Path
     *
     * Valor por defecto de la propiedad 'expire' de las cookies.
     *
     * @var string
     */
    public const PATH = '/';

    /**
     * Domain
     *
     * Valor por defecto de la propiedad 'domain' de las cookies.
     *
     * @var string
     */
    public const DOMAIN = '';

    /**
     * Secure
     *
     * Valor por defecto de la propiedad 'secure' de las cookies.
     *
     * @var bool
     */
    public const SECURE = false;

    /**
     * Http Only
     *
     * Valor por defecto de la propiedad 'httponly' de las cookies.
     *
     * @var bool
     */
    public const HTTPONLY = false;

    /**
     * Samesite
     *
     * Valor por defecto de la propiedad 'samesite' de las cookies.
     *
     * @var string
     */
    public const SAMESITE = '';

    /**
     * Constructor
     *
     * @access private
     */
    private function __construct()
    {
    }

}
