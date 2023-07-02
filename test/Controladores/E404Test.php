<?php

declare(strict_types=1);

namespace Controladores;

use Controlador\Base\Controlador;
use Controlador\E404;
use PHPUnit\Framework\TestCase;

class E404Test extends TestCase
{
    private E404 $controlador;

    public function setUp(): void
    {
        $this->controlador = new E404();
    }

    public function testExtenderDelControladorBase(): void
    {
        $this->assertInstanceOf(Controlador::class, $this->controlador);
    }

}
