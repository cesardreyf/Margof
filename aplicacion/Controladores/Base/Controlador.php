<?php

namespace Controlador\Base;

use Configuracion\Inters;
use Gof\Sistema\MVC\Controlador\Criterio\Ipiperf\Abstraccion\Controlador as IControlador;

/**
 * Clase abstracta para los controladores
 *
 * @package Margof\Controlador\Base
 */
abstract class Controlador extends IControlador
{
    use Traits\ACSRF;
    use Traits\Cookies;
    use Traits\Datos;
    use Traits\Redirigir;
    use Traits\Session;
    use Traits\Vista;

    /**
     * Almacena los datos para la vista
     *
     * @var array
     */
    protected array $datos = [];

    /**
     * Inicializa el controlador
     */
    public function iniciar()
    {
        $this->session()->iniciar();
        $this->vista()->datos($this->datos);

        // Gestión de inter's
        $this->inter()->agregarLista(new Inters());
        $this->inter()->ejecutar();
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

}
