<?php

require __DIR__ . '/../lib/router.php';

// The routes in a convenient mini dsl!

(new Router())
  ->route('\/notes\/?', function($route) {
    echo "test";
    $route
      ->get(function() {
        echo "test2";
        require __DIR__ . '/../views/notes/index.php'; 
      })
      ->post(function() {

      })
      ->patch(function() {

      })
      ->delete(function () {

      });
  })
  ->route('\/notes\/(\d+)', function($route) {
    $route
      ->get(function() {
        require __DIR__ . '/../views/notes/show.php'; 
      })
      ->post(function() {

      })
      ->patch(function() {

      })
      ->delete(function () {

      });
  })
  ->route('\/notes\/new\/?', function($route) {
    $route
      ->get(function() {
        require __DIR__ . '/../views/notes/new.php'; 
      });
  })
  ->route('\/log_in\/?', function($route) {
    $route
      ->get(function() {
        require __DIR__ . '/../views/session/log_in.php'; 
      });
  })
  ->route('\/log_out\/?', function($route) {
    $action = function() {

    };
    $route
      ->get($action)
      ->delete($action);
  })
  ->route('\/users\/new\/?', function($route) {
    $route
      ->get(function() {
        require __DIR__ . '/../views/users/new.php'; 
      });
  })
  ->route('\/users\/?', function($route) {
    $route
      ->patch(function() {

      });
  })
  ->render();