<?php

    use Gof\Datos\Archivos\Archivo;
    use Gof\Gestor\Mensajes\Guardar\GuardarEnArchivo;
    use Gof\Gestor\Registro\Simple\RegistroSimple;
    use Gof\Sistema\MVC\Registros\Errores\GuardarEn as GuardarError;
    use Gof\Sistema\MVC\Registros\Errores\Impresor as ImpresorDeErrores;
    use Gof\Sistema\MVC\Registros\Errores\Traductor as TraductorDeErrores;
    use Gof\Sistema\MVC\Registros\Excepciones\GuardarEn as GuardarExcepcion;
    use Gof\Sistema\MVC\Registros\Excepciones\Impresor as ImpresorDeExcepcion;
    use Gof\Sistema\MVC\Registros\Excepciones\Traductor as TraductorDeExcepciones;
    use Gof\Sistema\MVC\Sistema as SistemaMVC;

    // Depuración
    error_reporting(E_ALL);
    ini_set('display_errors', true);

    // Composer
    require '../vendor/autoload.php';

    // Sistema M.V.C de Gof
    $sistema = new SistemaMVC();
    $registros = $sistema->registros();
    $errores = $registros->errores();
    $excepciones = $registros->excepciones();

    register_shutdown_function([$errores, 'registrar']);
    set_exception_handler([$excepciones,  'registrar']);

    // Gestión de errores
    $traductorDeErrores = new TraductorDeErrores();
    $errorLog = new Archivo(dirname(__DIR__).'/registros/errores.log');
    $registroErrores = new RegistroSimple(new GuardarEnArchivo($errorLog));
    $errores->guardado()->agregar(new GuardarError($registroErrores, $traductorDeErrores));
    $errores->impresion()->agregar(new ImpresorDeErrores($traductorDeErrores));

    // Gestión de excepciones sin atrapar
    $traductorDeExcepciones = new TraductorDeExcepciones();
    $excepcionesLog = new Archivo(dirname(__DIR__).'/registros/excepciones.log');
    $registroExcepciones = new RegistroSimple(new GuardarEnArchivo($excepcionesLog));
    $excepciones->guardado()->agregar(new GuardarExcepcion($registroExcepciones, $traductorDeExcepciones));
    $excepciones->impresion()->agregar(new ImpresorDeExcepcion($traductorDeExcepciones));

    // Configuración del gestor de errores
    $errores->guardar  = true;
    $errores->imprimir = true;

    // Configuración del gestor de excepciones
    $excepciones->guardar  = true;
    $excepciones->imprimir = true;

    // Aplicacion Web
    require 'aplicacion.php';
    $aplicacion = new Aplicacion();
    $aplicacion->iniciar();
