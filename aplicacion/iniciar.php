<?php

    // Depuración
    error_reporting(E_ALL);
    ini_set('display_errors', true);

    // Composer
    require '../vendor/autoload.php';

    // Sistema Modelo-Vista-Controlador M.V.C
    $sistema   = new Gof\Sistema\MVC\Sistema();
    $registros = $sistema->registros();
    $errores   = $registros->errores();

    register_shutdown_function([$errores, 'registrar']);

    // Aplicacion Web
    require 'aplicacion.php';
    $aplicacion = new Aplicacion();
    $aplicacion->iniciar();
