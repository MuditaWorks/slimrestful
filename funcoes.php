<?php

function montaRotas(Slim\App $app) {
//    global $app;
    if ($dir = opendir('routes')) {
        while ($file = readdir($dir)) {
//            var_dump($file);
            $filename = str_replace('.', '', pathinfo( $file, PATHINFO_FILENAME));
            if (!empty($filename)) {
                echo __DIR__.'/routes/' . $filename . '.php <br>';
                require_once __DIR__.'/routes/'.$filename.'.php';
//                $classe = new $filename();
//                $app->get('/'.strtolower($filename), $classe.':home');
            }
        }
    }
}