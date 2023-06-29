<?php

    use Gof\Datos\Archivos\Archivo;
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

    $errores->simple()->guardarEn(new Archivo(dirname(__DIR__)     . '/registros/errores.log'));
    $excepciones->simple()->guardarEn(new Archivo(dirname(__DIR__) . '/registros/excepciones.log'));

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
