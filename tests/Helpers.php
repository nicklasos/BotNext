<?php

use DI\Container;
use DI\ContainerBuilder;

trait Helpers
{
    private function getContainer(): Container
    {
        $builder = new ContainerBuilder();

        $builder->addDefinitions(__DIR__ . "/../config/main.php");
        $builder->addDefinitions(__DIR__ . "/../config/dependencies.php");

        return $builder->build();
    }
}
