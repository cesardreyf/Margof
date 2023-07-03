<?php

namespace Controlador\Base\Traits;

use Configuracion\Session as ConfiguracionSession;
use Gof\Contrato\Session\Session as ISession;
use Gof\Gestor\Session\Session as GestorDeSession;

/**
 * Trait encargado de definir la función de acceso al gestor de cookies
 *
 * @package Controlador\Traits
 */
trait Session
{
    /**
     * Gestor de sesiones
     *
     * Almacena la instancia del gestor de sesiones.
     *
     * @var ISession
     */
    private ISession $gestorDeSession;

    /**
     * Obtiene el gestor de sesión
     *
     * @return ISession
     */
    public function session(): ISession
    {
        return $this->gestorDeSession ?? $this->gestorDeSession = new GestorDeSession(
            ConfiguracionSession::OPCIONES,
            ConfiguracionSession::CONFIGURACION
        );
    }

}
