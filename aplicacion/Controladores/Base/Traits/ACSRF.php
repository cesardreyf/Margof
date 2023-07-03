<?php

namespace Controlador\Base\Traits;

use Gof\Contrato\Cookies\Cookies;
use Gof\Contrato\Session\Session;
use Gof\Sistema\ACSRF\ACSRF as SistemaACSRF;

/**
 * @package Controlador\Traits
 */
trait ACSRF
{
    /**
     * Instancia del sistema ACSRF
     *
     * @var SistemaACSRF
     */
    public SistemaACSRF $acsrf;

    /**
     * Gestor de sesión
     *
     * @return Session
     */
    abstract public function session(): Session;

    /**
     * Gestor de cookies
     *
     * @return Cookies
     */
    abstract public function cookies(): Cookies;

    /**
     * Obtiene una instancia del sistema anti CSRF
     *
     * @return SistemaACSRF
     */
    public function acsrf(): SistemaACSRF
    {
        return $this->acsrf ?? $this->acsrf = new SistemaACSRF($this->session(), $this->cookies());
    }

}
