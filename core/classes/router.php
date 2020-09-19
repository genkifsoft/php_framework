<?php
    class router {
        private $routers;

        public function __construct() {
            $this->routers = $GLOBALS["config"]["routers"];
            $route = $this->findRoute();
            if (class_exists($route["controller"])) {
                $controller = new $route["controller"];
                if (method_exists($controller, $route["method"])) {
                    call_user_func(array($controller, $route["method"]));
                } else {
                    internal_error::show(404);
                }
            } else {
                internal_error::show(404);
            }
        }

        private function routerPart($route) {
            if (is_array($route)){
                $route = $route["url"];
            }
            $parts = explode("/", $route);
            return $parts;
        }

        private static function uri($part) {
            $parts = explode("/", $_SERVER["REQUEST_URI"]);
            if ($parts[1] == $GLOBALS["config"]["path"]["index"]){
                $part++;
            }
            return (isset($parts[$part])) ? $parts[$part] : "";
        }

        private function findRoute() {
            foreach($this->routers as $route) {
                $parts = $this->routerPart($route);
                $allMatch = true;
                foreach($parts as $key => $value) {
                    if ($value != "*"){
                        if (Router::uri($key) != $value) {
                            $allMatch = false;
                        }
                    }
                }
                if ($allMatch) {
                    return $route;
                }
            }
            $uri_1 = Router::uri(1);
            $uri_2 = Router::uri(2);
            if ($uri_1 == "") {
                $uri_1 = $GLOBALS["config"]["defaults"]["controller"];
            }
            if ($uri_2 == "") {
                $uri_2 = $GLOBALS["config"]["defaults"]["method"];
            }
            $route = array(
                "controller" => $uri_1,
                "method" => $uri_2,
            );

            return $route;
        }
    }
?>