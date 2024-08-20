<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '/comments/{id:\d+}', 'App\Comments\Presentation\CommentController@show');
};
