<?php 

namespace Sectheater\Http ;
class route
{
    public static $routes = [""];

    public $request;
    public $response;
    public function __construct($request,$response)
    {
        $this->request = $request;
        $this->response = $response;
    }
    public static function get($route,$action){
        self::$routes['get'][$route] = $action ;
    }

    public static function post($route,$action){
        self::$routes['post'][$route] = $action ;
    }

    public function resolve(){
        $path = $this->request->path();
        $method = $this->request->method();
        
        $action = SELF::$routes[$method][$path] ?? false;
        if(!$action){
            return;
        }
        //404 error


        if(is_callable($action)){
            call_user_func_array($action,[]);
        }

        else if(is_array($action)){
            call_user_func_array([new $action[0],$action[1]],[]);
        }
    }

}