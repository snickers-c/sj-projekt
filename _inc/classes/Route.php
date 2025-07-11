<?php
class Route
{


  private static $routes = [];
  private static $notFoundView = 'views/404.php';


  /**
   * Checks whether file corresponding to the current path exists.
   * @return controller/view
   */
  public static function routeExists(string $uri)
  {
    if (array_key_exists($uri, self::$routes)) {
      return self::$routes[$uri];
    } else {
      http_response_code(404);
      return self::$notFoundView;
    }
  }

  /**
   * First parameter sets given path as both key and value.
   * Optional second parameter sets given path as controller.
   */
  public static function set(string $urlPath, string|null $fileName = null)
  {
    self::$routes[$urlPath] = 'controllers' . ($fileName ? $fileName : $urlPath) . '.php';
  }
}
