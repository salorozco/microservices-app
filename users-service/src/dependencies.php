<?php

use App\Framework\Dbal\ConnectionFactory;
use Auryn\Injector;
use App\Users\Infrastructure\UserRepository;
use App\Users\Application\UserService;
use App\Users\Presentation\UserController;
use Doctrine\DBAL\Connection;

// Create and configure the dependency injection container
$injector = new Injector();

// Register dependencies and services
$injector->share(UserRepository::class);
$injector->alias(App\Users\Domain\UserRepositoryInterface::class, UserRepository::class);
$injector->share(UserService::class);
$injector->share(UserController::class);

$injector->delegate(Connection::class, function () use ($injector): Connection {
    return $injector->make(ConnectionFactory::class)->create();
});


// Return the configured injector
return $injector;
