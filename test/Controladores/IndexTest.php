<?php

declare(strict_types=1);

namespace Controladores;

use Controlador\Base\Controlador;
use Controlador\Index;
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
        $this->assertInstanceOf(Controlador::class, $this->controlador);
    }

}
