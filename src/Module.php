<?php
namespace Mostad\User;

/**
 * Class Module
 *
 * @package Mostad\User
 */
class Module
{
    /**
     * @return array
     */
    public function getConfig()
    {
        return (array)require __DIR__ . '/../config/module.config.php';
    }
}
