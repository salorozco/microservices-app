<?php

use Auryn\Injector;
use GuzzleHttp\Client;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

// Create and configure the dependency injection container
$injector = new Injector();

// Register Guzzle HTTP Client
$injector->share(Client::class);

// Register Symfony HTTP Client
$injector->delegate(HttpClientInterface::class, function () {
    return HttpClient::create();
});

// Optionally, configure how specific classes or interfaces are instantiated
// Example: If you have custom configurations or need to inject specific parameters
// $injector->define(SomeClass::class, [
//     ':parameterName' => $value,
// ]);

// Register other services and dependencies
// For example, if you had a Logger service:
// $injector->share(Logger::class);
// $injector->define(Logger::class, [
//     ':logFilePath' => '/path/to/logfile.log',
// ]);

// You can also delegate the creation of certain classes to a factory function
// $injector->delegate(SomeClass::class, function () {
//     return new SomeClass(new Dependency());
// });

// Return the configured injector
return $injector;
