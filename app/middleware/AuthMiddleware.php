<?php
class AuthMiddleware {

  // protected static $user;

  public static function run_middleware(string $controller, string $method): void {
    $authRequired = [
      'Home' => ['index', 'method2'],
      'Controller2' => ['method3'],
    ];
    $unauthRequired = [
      'Login' => ['index'],
      'Signup' => ['index']
    ];

    $currentController = ucfirst($controller);

    if (isset($authRequired[$currentController]) &&
      in_array($method, $authRequired[$currentController])) {
      Self::is_authenticated();
    }
    if (isset($unauthRequired[$currentController]) &&
      in_array($method, $unauthRequired[$currentController])) {
      Self::not_authenticated();
    }
  }

  private static function check():bool {
    // Start the session
    // session_start();
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // If the session ID is not set, the user is not authenticated

    if (!isset($_SESSION['session_id'])) {
      // Destroy the session
      session_destroy();

      return false;
    }

    // Get the user's data from the database
    $user = new UserModel;

    $data['session_id'] = $_SESSION['session_id'];

    // If the user's data is not found, the user is not authenticated
    if (!$user->first($data)) {
      // Destroy the session
      session_destroy();

      return false;
    }

    // The user is authenticated
    return true;
  }

  public static function is_authenticated():void {
    if (!self::check()) {
      redirect('login');
    }
  }

  public static function not_authenticated():void {
    if (self::check()) {
      redirect('home');
    }
  }
}
?>


