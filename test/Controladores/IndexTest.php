<?php

declare(strict_types=1);

namespace Controladores;

use Controlador\Index;
use Gof\Sistema\MVC\Interfaz\Ejecutable;
use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    private Index $controlador;

    public function setUp(): void
    {
        $this->controlador = new Index();
    }

    public function testExtenderDelControladorBase(): void
    {
        $this->assertInstanceOf(Ejecutable::class, $this->controlador);
    }

}
