<?php

namespace Controlador\Base;

use Gof\Sistema\MVC\Aplicacion\Criterio\Ipiperf\Datos\Registros;
use Gof\Sistema\MVC\Aplicacion\Criterio\Ipiperf\Interfaz\Controlador as IControlador;

abstract class Controlador implements IControlador
{
    protected Registros $registros;

    protected readonly array $parametros;

    public function __construct()
    {
        $this->registros = new Registros();
    }

    public function parametros(array $parametros)
    {
        $this->parametros = $parametros;
    }

    public function iniciar()
    {
    }

    public function preindice()
    {
    }

    abstract public function indice();

    public function posindice()
    {
    }

    public function error()
    {
    }

    public function renderizar()
    {
    }

    public function finalizar()
    {
    }

    public function registros(): Registros
    {
        return $this->registros;
    }

}
