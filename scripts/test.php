<?php

use Bot\Entity\User;

require dirname(__DIR__) . '/bootstrap.php';

$redis = new Predis\Client(null, [
    'prefix' => 'test:',
]);

$userRepository = new \Bot\Repository\UserRepository($redis);

$user = new User();
$user->setName('Nicklasos');
$user->setId(1);

$userRepository->save($user);

$user = $userRepository->findById(1);

var_dump($user->getName());

$userRepository->deleteById(1);

