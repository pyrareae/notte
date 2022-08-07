<?php

require __DIR__ . '/../lib/router.php';

// spl_autoload_register(function ($class_name) {
//     include  __DIR__ . '/../models/' . strtolower($class_name) . '.php';
// });


include __DIR__.'/../models/note.php';
include __DIR__.'/../views/layout.php';
// The routes in a convenient mini dsl!

(new Router())
  ->route('\/?', function($route) {
    http_response_code(301);
    header('Location: /notes');
    exit();
  })
  ->route('\/notes\/?', function($route) {
    $route
      ->get(function() {
        $ctx = new stdClass(); // context for view rendering
        $Note = new Model\Note(); // model instance

        $ctx->notes = $Note->getAllNotes();
        $ctx->mew = 'mew';

        layout(__DIR__ . '/../views/notes/index.php', $ctx); 
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