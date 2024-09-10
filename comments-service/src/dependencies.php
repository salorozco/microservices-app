<?php

use App\Framework\Dbal\ConnectionFactory;
use Auryn\Injector;
use App\Comments\Infrastructure\CommentRepository;
use App\Comments\Application\CommentService;
use App\Comments\Presentation\CommentController;
use Doctrine\DBAL\Connection;

// Create and configure the dependency injection container
$injector = new Injector();

// Register dependencies and services
$injector->share(CommentRepository::class);
$injector->alias(App\Comments\Domain\CommentRepositoryInterface::class, CommentRepository::class);
$injector->share(CommentService::class);
$injector->share(CommentController::class);

$injector->delegate(Connection::class, function () use ($injector): Connection {
    return $injector->make(ConnectionFactory::class)->create();
});


// Return the configured injector
return $injector;
