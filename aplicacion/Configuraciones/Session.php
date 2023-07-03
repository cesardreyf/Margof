<?php

namespace Configuracion;

use Gof\Gestor\Session\Session as GestorSession;

/**
 * Almacena los datos de configuración del gestor de sesión
 *
 * Almacena los datos que serán pasados al constructor del gestor de sesión
 * para establecer los valores por defecto al momento de iniciar sesión.
 *
 * @package Configuracion
 */
abstract class Session
{

    /**
     * Opciones que serán pasados al iniciar la sesión
     *
     * Estas opciones son pasadas a la función session_start por el gestor.
     *
     * @var array
     */
    public const OPCIONES = [
    ];

    /**
     * Configuración del gestor
     *
     * Máscara de bits con la configuración del gestor.
     *
     * @var int
     */
    public const CONFIGURACION = GestorSession::ELIMINAR_COOKIES_AL_DESTRUIR;

}
