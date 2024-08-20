<?php

use Auryn\Injector;
use App\Comments\Infrastructure\CommentRepository;
use App\Comments\Application\CommentService;
use App\Comments\Presentation\CommentController;

// Create and configure the dependency injection container
$injector = new Injector();

// Register dependencies and services
$injector->share(CommentRepository::class);
$injector->alias(App\Comments\Domain\CommentRepositoryInterface::class, CommentRepository::class);
$injector->share(CommentService::class);
$injector->share(CommentController::class);

// Return the configured injector
return $injector;
