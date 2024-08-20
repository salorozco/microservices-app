<?php

use App\Framework\Dbal\ConnectionFactory;
use Auryn\Injector;
use App\Posts\Infrastructure\PostRepository;
use App\Posts\Application\PostService;
use App\Posts\Presentation\PostController;
use Doctrine\DBAL\Connection;

// Create and configure the dependency injection container
$injector = new Injector();

// Register dependencies and services
$injector->share(PostRepository::class);
$injector->alias(App\Posts\Domain\PostRepositoryInterface::class, PostRepository::class);
$injector->share(PostService::class);
$injector->share(PostController::class);

$injector->delegate(Connection::class, function () use ($injector): Connection {
    return $injector->make(ConnectionFactory::class)->create();
});


// Return the configured injector
return $injector;
