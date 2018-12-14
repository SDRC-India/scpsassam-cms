<?php

/**
 * Interface SupsysticTablesPro_Importer_Interface
 */
interface SupsysticTablesPro_Importer_Interface 
{
    public function import($fileName);
    public function setSettings($settings);
}