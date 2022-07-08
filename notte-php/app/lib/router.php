<?php

class Route {
  public $route;
  public $callback;
  public $matches;

  public function __construct($route, $callback) {
    $this->route = $route;
    $this->callback = $callback;
  }

  public function match($path) {
    $this->matches = Array();
    // echo "matching $path against ".$this->route."<br/>";
    if (!preg_match("/^$this->route\$/", $path, $this->matches)) return false;

    return $this;
  }

  public function execute() {
    return ($this->callback)($this);
  }

  public function get($func) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') $func();
    return $this;
  }

  public function post($func) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') $func();
    return $this;
  }

  public function patch($func) {
    if ($_SERVER['REQUEST_METHOD'] == 'PATCH') $func();
    return $this;
  }

  public function delete($func) {
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') $func();
    return $this;
  }
}

class Router {
  public $routes;
  public function __construct() {
    $this->routes = [];
  }

  // add route
  public function route($route, $callback) {
    $this->routes[] = new Route($route, $callback);
    return $this;
  }

  // apply routing
  public function render() {
    $route = $this->findRoute();

    // Abort and return 404 if no matches found.
    if (!$route) return $this->notFound();

    global $PATH_PARAMS;
    // Chop the 1st el off, and only keep the match data.
    $PATH_PARAMS = array_map(function($el) { return $el[0]; }, array_slice($route->matches, 1));

    $route->execute();
  }

  function findRoute() {
    $path = $_SERVER['REQUEST_URI'];

    foreach ($this->routes as $route) {
      if ($route->match($path)) {
        return $route;
      }
    }

    return false;
  }

  function notFound() {
    require __DIR__ . '/../views/404.php';
  }
}