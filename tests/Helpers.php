<?php

use DI\Container;
use DI\ContainerBuilder;

trait Helpers
{
    private function getContainer(array $params = []): Container
    {
        $builder = new ContainerBuilder();

        $builder->addDefinitions(array_dot_flatten(require ROOT . '/config/main.php'));
        $builder->addDefinitions(ROOT . '/config/dependencies.php');
        $builder->addDefinitions(array_dot_flatten($params));

        return $builder->build();
    }
}
