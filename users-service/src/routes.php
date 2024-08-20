<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '/users/{id:\d+}', 'App\Users\Presentation\UserController@show');
};
