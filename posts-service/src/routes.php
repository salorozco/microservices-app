<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '/posts/{id:\d+}', 'App\Posts\Presentation\PostController@show');
};
