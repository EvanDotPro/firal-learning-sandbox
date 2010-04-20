<?php
interface Default_Service_WebsiteInterface
{
    /**
     * Returns information on the website that should be loaded based on the host/path
     *
     * @param string $host
     * @param string $path
     * @access public
     * @return array
     */
    public function getByHostPath($host, $path);
}
