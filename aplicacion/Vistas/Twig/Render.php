<?php

namespace Vista\Twig;

use Controlador\Base\Controlador;
use Gof\Interfaz\Archivos\Carpeta;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Vista\Interfaz\Render as IRender;

/**
 * Renderiza las plantillas con twig
 *
 * Usa el motor de plantillas Twig para renderizar.
 *
 * @package Vista\Twig
 */
class Render implements IRender
{
    /**
     * @var string Ruta de la carpeta que almacena todas las plantillas.
     */
    public const PLANTILLA_CARPETA = __DIR__ . '/Html';

    /**
     * @var string Extensión de las plantillas por defecto.
     */
    public const PLANTILLA_EXTENSION = '.html';

    /**
     * @var Environment
     */
    protected Environment $twig;

    /**
     * @var string Almacena el nombre de la plantilla a ser renderizada.
     */
    protected string $plantilla = '';

    /**
     * @var string Almacena la extensión por defecto.
     */
    public string $extension;

    /**
     * Almacena el conjunto de datos que será pasado a la plantilla al momento de renderizar.
     *
     * @var array
     */
    public array $datos = [];

    /**
     * Constructor
     *
     * @param ?Carpeta $carpeta   Carpeta donde buscar las plantillas (Opcional).
     * @param ?string  $extension Extensión por defecto de las plantillas (Opcional).
     */
    public function __construct(?Carpeta $carpeta = null, ?string $extension = null)
    {
        // Establece la ruta de la carpeta de las plantillas donde buscará twig
        $ruta = is_null($carpeta) ? self::PLANTILLA_CARPETA : $carpeta->ruta();
        $this->extension = $extension ?? self::PLANTILLA_EXTENSION;

        $loader = new FilesystemLoader($ruta);
        $this->twig = new Environment($loader);
    }

    /**
     * Renderiza la plantilla
     *
     * @return bool Devuelve el estado de la renderización.
     */
    public function renderizar(): bool
    {
        if( empty($this->plantilla) ) {
            return false;
        }

        echo $this->twig->render("{$this->plantilla}{$this->extension}", $this->datos);
        return true;
    }

    /**
     * Define la plantilla a ser renderizada
     *
     * @param string $plantilla Nombre del archivo.
     */
    public function plantilla(string $plantilla)
    {
        $this->plantilla = $plantilla;
    }

    /**
     * Relaciona la plantilla con el nombre de un controlador
     *
     * Obtiene el nombre del controlador y le quita el primero espacio de nombre (Controlador).
     * De ese nombre relaciona la plantilla.
     *
     * @param Controlador $controlador Controlador a relacionar.
     *
     * @see Render::relacionarPlantilla()
     */
    public function relacionarControlador(Controlador $controlador)
    {
        $this->relacionarPlantilla(get_class($clase));
    }

    /**
     * Relaciona la plantilla con el nombre de una clase
     *
     * Define el valor de la plantilla teniendo en cuenta el nombre completo de
     * una clase y lo relaciona con la estructura de carpetas de las
     * plantillas.
     *
     * Por defecto remueve el primer espacio de nombre (todo lo que esté antes
     * del caracter '\').
     *
     * Ejemplo: si se pasa 'Controlador\Perfil\Editar' se relacionará la
     * plantilla a la ruta '{carpeta_plantillas}/perfil/editar.{extension}'.
     *
     * @param string $clase Nombre completo de la clase.
     */
    public function relacionarPlantilla(string $plantilla)
    {
        $plantilla = strtolower($plantilla);
        $plantilla = substr($plantilla, strpos($plantilla, '\\') + 1);
        $this->plantilla = str_replace('\\', DIRECTORY_SEPARATOR, $plantilla);
    }

    /**
     * Define el array de datos interno
     *
     * @param array &$datos
     */
    public function datos(array &$datos)
    {
        $this->datos =& $datos;
    }

    /**
     * Devuelve una referencia a los datos
     *
     * @return array
     */
    public function& datosRef(): array
    {
        return $this->datos;
    }

}
