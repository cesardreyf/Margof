<?php

    use Configuracion\Rutas\Simple\Rutas;
    use Gof\Datos\Archivos\Archivo;
    use Gof\Datos\Archivos\Carpeta;
    use Gof\Sistema\MVC\Controlador\Criterio\Ipiperf;
    use Gof\Sistema\MVC\Sistema;

    // Depuración
    define('PRODUCCION', false);

    if( PRODUCCION ) {
        error_reporting(E_ALL);
        ini_set('track_errors', true);
        ini_set('display_errors', true);
    }

    // Composer
    require '../vendor/autoload.php';

    // Sistema M.V.C de Gof
    $sistema   = new Sistema();
    $registros = $sistema->registros();

    $errores     = $registros->errores();
    $excepciones = $registros->excepciones();

    register_shutdown_function([$errores, 'registrar']);
    set_exception_handler([$excepciones,  'registrar']);

    // Configuración del gestor de errores y excepciones
    $errores->guardar      = true;
    $excepciones->guardar  = true;

    $errores->imprimir     = true;
    $excepciones->imprimir = true;

    // Establece dónde se guardarán los errores y las excepciones
    $errores->simple()->guardarEn(new Archivo(dirname(__DIR__)     . '/registros/errores.log'));
    $excepciones->simple()->guardarEn(new Archivo(dirname(__DIR__) . '/registros/excepciones.log'));

    // Gestión de autoload
    $autoload = $sistema->autoload();
    $autoload->reservar('Configuracion', new Carpeta(__DIR__ . '/Configuraciones'));
    $autoload->reservar('Controlador',   new Carpeta(__DIR__ . '/Controladores'));
    $autoload->reservar('Vista',         new Carpeta(__DIR__ . '/Vistas'));
    $autoload->reservar('',              new Carpeta(__DIR__ . '/Modelos'));

    // Gestión de rutas
    $enrutador = $sistema->rutas();
    $enrutador->simple()->datos = new Rutas();
    $enrutador->simple()->activar();

    // Gestión del controlador
    $controlador = $sistema->controlador();
    $controlador->espacioDeNombre('Controlador\\');
    $controlador->criterio(new Ipiperf());

    // Aplicacion Web
    $aplicacion = $sistema->aplicacion();
    $aplicacion->ejecutar();
