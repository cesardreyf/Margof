<?php

namespace Vista\Interfaz;

/**
 * Interfaz para el render
 *
 * @package Vista\Interfaz
 */
interface Render
{
    /**
     * Establece la plantilla a ser renderizada
     *
     * @param string $nombre
     */
    public function plantilla(string $nombre);

    /**
     * Renderiza la plantilla
     *
     * @return bool Devuelve el estado de la renderización.
     */
    public function renderizar(): bool;

    /**
     * Define el array de datos a ser enviados a la vista
     *
     * @param array &$datos
     */
    public function datos(array &$datos);
}
