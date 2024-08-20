<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '/users/{id:\d+}', 'App\Users\Presentation\UserController@show');
    $r->addRoute('GET', '/posts/{id:\d+}', 'App\Posts\Presentation\PostController@show');
    $r->addRoute('GET', '/comments/{id:\d+}', 'App\Comments\Presentation\CommentController@show');
};
