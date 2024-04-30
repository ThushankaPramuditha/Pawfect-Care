<?php
class AuthMiddleware {

  // Method to check if the user is authenticated
  private static function check():bool {
    // Start the session if not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // If the session ID is not set, the user is not authenticated
    if (!isset($_SESSION['USER'])) {
      return false;
    }

    // Get the user's data from the database
    $user = new UserModel;
    $data = (array)$_SESSION['USER'];

    // If the user's data is not found in the database, the user is not authenticated
    if (!$user->first($data)) {
      return false;
    }

    // The user is authenticated
    return true;
  }

  // Method to run authentication middleware
  public static function run_middleware(string $controller, string $method): void {
    // Define which controllers and methods require authentication
    $authRequired = [
      'PetOwnerhome' => ['index', 'method2'],
      'Controller2' => ['method3'],
    ];

    // Define which controllers and methods do not require authentication
    $unauthRequired = [
      'Login' => ['index'],
      'Signup' => ['index']
    ];

    // Get the current controller name
    $currentController = ucfirst($controller);

    // Check if authentication is required for the current controller and method
    if (isset($authRequired[$currentController]) &&
      in_array($method, $authRequired[$currentController])) {
      // If authentication is required, check if the user is authenticated
      Self::is_authenticated();
    }

    // Check if authentication is not required for the current controller and method
    if (isset($unauthRequired[$currentController]) &&
      in_array($method, $unauthRequired[$currentController])) {
      // If authentication is not required, check if the user is not authenticated
      Self::not_authenticated();
    }
  }

  // Method to redirect to login page if user is not authenticated
  public static function is_authenticated():void {
    if (!self::check()) {
      redirect('login');
    }
  }

  // Method to redirect to home page if user is authenticated
  public static function not_authenticated():void {
    if (self::check()) {
      redirect('home');
    }
  }
}
