<?php

include './config.php';
class factoryClass
{
    public static function createfactoryClass($class)
    {
        new $class;
    }
}

factoryClass::createfactoryClass('routeController');
factoryClass::createfactoryClass('userController');