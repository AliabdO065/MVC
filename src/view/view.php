<?php
namespace Sectheater\view ;

class view
{
    public static function make($view ,$prams = []){
        $basecont = SELF::getBaseContent();

        $viewcont = SELF::getViewContent($view , $prams);

        echo str_replace('{{content}}', $viewcont, $basecont);
    }
    public function getBaseContent(){
        ob_start();
        include base_path() .'Views/layouts/main.php';        
        return ob_get_clean();
    }
    public function getViewContent($view ,$iserror = false , $prams=[]){
        $path = $iserror ? view_path() . 'errors/' : view_path();
        if (str_contains($view, '.')) {
            $views = explode('.', $view);

            foreach ($views as $view) {
                if (is_dir($path . $view)) {
                    $path = $path . $view . '/';
                }
            }
            $view = $path . end($views) . '.php';
        }else {
            $view = $path . $view . '.php';
        }

        // extract($params);
        
        if ($iserror) {
            include $view;
        } else {
            ob_start();

            include $view;

            return ob_get_clean();
        }
    }
}