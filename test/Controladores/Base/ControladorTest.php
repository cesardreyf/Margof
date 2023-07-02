<?php

declare(strict_types=1);

namespace Controladores\Base;

use Controlador\Base\Controlador;
use Gof\Sistema\MVC\Aplicacion\Criterio\Ipiperf\Interfaz\Controlador as InterfazDelControlador;
use PHPUnit\Framework\TestCase;

class ControladorTest extends TestCase
{
    private Controlador $controlador;

    public function setUp(): void
    {
        $this->controlador = $this->createMock(Controlador::class);
    }

    public function testExtenderDelControladorBase(): void
    {
        $this->assertInstanceOf(InterfazDelControlador::class, $this->controlador);
    }

}
