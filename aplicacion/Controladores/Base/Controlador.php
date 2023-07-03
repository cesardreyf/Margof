<?php

namespace Controlador\Base;

use Gof\Sistema\MVC\Aplicacion\Criterio\Ipiperf\Datos\Registros;
use Gof\Sistema\MVC\Aplicacion\Criterio\Ipiperf\Interfaz\Controlador as IControlador;

/**
 * Interfaz abstracta para los controladores
 *
 * @package Margof\Controlador\Base
 */
abstract class Controlador implements IControlador
{
    use Traits\Vista;

    /**
     * Almacena los registros que alteran el comportamiento del controlador
     *
     * @var Registros
     */
    protected Registros $registros;

    /**
     * Almacena los parámetros recibidos por el enrutador
     *
     * @var array
     */
    protected readonly array $parametros;

    /**
     * Almacena los datos para la vista
     *
     * @var array
     */
    protected array $datos = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->registros = new Registros();
    }

    /**
     * Inicializa el controlador
     */
    public function iniciar()
    {
        $this->vista()->datos($this->datos);
    }

    /**
     * Se ejecuta antes del método indice()
     *
     * Segundo método en ser llamado por la aplicación, después de iniciar().
     */
    public function preindice()
    {
    }

    /**
     * Método principal que deben implementar los controladores
     *
     * Es llamado por la aplicación justo después de preindice() siempre y
     * cuando el registro **error** sea diferente de **false**.
     *
     * Luego de llamarse al método error(), si está activo el registro
     * **continuar**, a pesar del error se continuará con el orden esperado y
     * esta función será llamada. Los valores de los registros **error** y
     * **continuar** serán reestablecidos por la aplicación.
     */
    abstract public function indice();

    /**
     * Se ejecuta justo después del método indice()
     *
     * Este método es llamado por la aplicación después de llamar al indice() si
     * el registro **error** es **false**. Caso contrario se llamará al método error().
     *
     * Si el registro **continuar** es igual a **true**, tras llamar al método error(),
     * esta función será llamada por la aplicación.
     */
    public function posindice()
    {
    }

    /**
     * Procesa los errores del controlador
     *
     * Si ocurre un error en preindice() o indice() esta función será llamada.
     */
    public function error()
    {
    }

    /**
     * Renderiza la vista
     *
     * Función encargada de renderizar la vista.
     *
     * Esta función es llamada por la aplicación antes de finalizar el
     * controlador siempre y cuando el registro **renderizar** sea **true**.
     * Caso contrario la aplicación ignorará este método y pasará al siguiente.
     */
    public function renderizar()
    {
        $this->vista()->renderizar();
    }

    /**
     * Finaliza el controlador
     *
     * Último método que llama la aplicación.
     */
    public function finalizar()
    {
    }

    /**
     * Establece los parámetros del controlador
     *
     * @param array $parametros
     */
    public function parametros(array $parametros)
    {
        $this->parametros = $parametros;
    }

    /**
     * Obtiene los registros del controlador
     *
     * @return Registros
     */
    public function registros(): Registros
    {
        return $this->registros;
    }

}
