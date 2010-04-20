<?php
class ClientBootstrap extends Firal_Bootstrap
{
    protected function _initSampleAddon()
    {
        $loader = new Firal_Addon_Loader();
        $loader->loadAddon('sample');
    }
}
