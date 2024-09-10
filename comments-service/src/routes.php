<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '/comments/{id:\d+}', 'App\Comments\Presentation\CommentController@show');
    $r->addRoute('GET', '/comments/by-posts', 'App\Comments\Presentation\CommentController@showCommentsByPostIds');

};
