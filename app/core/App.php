<?php

class App {
    private string $controller = 'Home';
    private string $method = 'index';

    private function splitURL(): array {
        $URL = $_GET['url'] ?? 'home';
        $URL = explode("/", trim($URL, "/"));
        return $URL;
    }


    public function loadController(): void {
        $URL = $this->splitURL();

        // Select controller
        if ($URL[0] == 'admin'){
            unset($URL[0]);
            // echo $URL[1];

            $filename = "../app/controllers/Admin/" . ucfirst($URL[1]) . ".php";

            if (file_exists($filename)) {
                require $filename;
                $this->controller = ucfirst($URL[1]);
                // echo $this->controller;
                unset($URL[1]);
            } else {
                require "../app/controllers/_404.php";
                $this->controller = "_404";
            }
            $controller = new $this->controller;


            if (!empty($URL[2])) {
                if (method_exists($controller, $URL[2])) {
                    //  show($URL[2]);
                    $this->method = $URL[2];
                    unset($URL[2]);
                }
            }



        } else {
            $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";
            if (file_exists($filename)) {
                require $filename;
                $this->controller = ucfirst($URL[0]);
                unset($URL[0]);
            } else {
                require "../app/controllers/_404.php";
                $this->controller = "_404";
            }

            $controller = new $this->controller;


            if (!empty($URL[1])) {
                if (method_exists($controller, $URL[1])) {
                    //  show($URL[1]);
                    $this->method = $URL[1];
                    unset($URL[1]);
                }
            }
        }

        // $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";
        // if (file_exists($filename)) {
        //     require $filename;
        //     $this->controller = ucfirst($URL[0]);
        //     unset($URL[0]);
        // } else {
        //     require "../app/controllers/_404.php";
        //     $this->controller = "_404";
        // }

        // Run middleware before executing the controller's action

        // $controller = new $this->controller;

        // // Select method
        // if (!empty($URL[1])) {
        //     if (method_exists($controller, $URL[1])) {
        //         //  show($URL[1]);
        //         $this->method = $URL[1];
        //         unset($URL[1]);
        //     }
        // }
        // $this->runMiddleware();
        //AuthMiddleware::run_middleware($this->controller, $this->method);

        call_user_func_array([$controller, $this->method], $URL);
    }
}


?>
