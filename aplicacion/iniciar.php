<?php

    use Gof\Datos\Archivos\Archivo;
    use Gof\Gestor\Mensajes\Guardar\GuardarEnArchivo;
    use Gof\Gestor\Registro\Simple\RegistroSimple;
    use Gof\Sistema\MVC\Registros\Errores\GuardarEn;
    use Gof\Sistema\MVC\Registros\Errores\Impresor as ImpresorDeErrores;
    use Gof\Sistema\MVC\Registros\Errores\Traductor as TraductorDeErrores;
    use Gof\Sistema\MVC\Sistema as SistemaMVC;

    // Depuración
    // error_reporting(E_ALL);
    // ini_set('display_errors', true);

    // Composer
    require '../vendor/autoload.php';

    // Sistema M.V.C de Gof
    $sistema = new SistemaMVC();
    $registros = $sistema->registros();
    $errores = $registros->errores();

    register_shutdown_function([$errores, 'registrar']);

    // Gestión de errores
    $traductorDeErrores = new TraductorDeErrores();
    $errorLog = new Archivo(dirname(__DIR__).'/registros/errores.log');
    $registroLog = new RegistroSimple(new GuardarEnArchivo($errorLog));
    $errores->guardado()->agregar(new GuardarEn($registroLog, $traductorDeErrores));
    $errores->impresion()->agregar(new ImpresorDeErrores($traductorDeErrores));

    // Configuración del gestor de errores
    $errores->guardar  = true;
    $errores->imprimir = true;

    // Aplicacion Web
    require 'aplicacion.php';
    $aplicacion = new Aplicacion();
    $aplicacion->iniciar();
