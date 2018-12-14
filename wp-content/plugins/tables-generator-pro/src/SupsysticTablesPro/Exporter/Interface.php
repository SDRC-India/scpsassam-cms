<?php


interface SupsysticTablesPro_Exporter_Interface
{
    /**
     * Exports specified data.
     * @param array $data
     * @return mixed
     */
    public function export(array $data);
}