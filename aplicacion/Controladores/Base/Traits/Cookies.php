<?php

namespace Controlador\Base\Traits;

use Configuracion\Cookies as CookiesConfiguracion;
use Gof\Contrato\Cookies\Cookies as ICookies;
use Gof\Gestor\Cookies\Cookies as GestorDeCookies;

/**
 * Trait encargado de definir la función de acceso al gestor de cookies
 *
 * @package Controlador\Traits
 */
trait Cookies
{
    /**
     * Gestor de cookies
     *
     * Almacena la instancia al gestor de cookies.
     *
     * @var ICookies
     */
    private ICookies $gestorDeCookies;

    /**
     * Obtiene el gestor de cookies
     *
     * @return ICookies
     */
    public function cookies(): ICookies
    {
        return $this->gestorDeCookies ?? $this->gestorDeCookies = new GestorDeCookies(
            CookiesConfiguracion::DURACION,
            CookiesConfiguracion::PATH,
            CookiesConfiguracion::DOMAIN,
            CookiesConfiguracion::SECURE,
            CookiesConfiguracion::HTTPONLY
        );
    }

}
