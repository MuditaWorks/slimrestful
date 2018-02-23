<?php

//----- Verifica se a pasta "Action" é válida
if ($dir = opendir(__DIR__.'/Action/')) {
    //----- Passa por cada arquivo do diretório
    while ($file = readdir($dir)) {
        $filename = str_replace('.', '', pathinfo( $file, PATHINFO_FILENAME));

        if (!empty($filename)) {
            $name = strtolower(str_replace('Action', '', $filename));
            $name = $name == 'home' ? '' : $name;
            $funcs = (new ReflectionClass("App\\Action\\{$filename}"))->getMethods();

            //----- Passa pelas funções do arquivo
            foreach ($funcs as $func) {
                if(substr($func->name, 0, 2) != '__') {
                    $funcName = '';
                    if (strtolower($func->name) != 'home') {
                        if (!empty($name)) {
                            $funcName .= '/';
                        }
                        $funcName .= strtolower($func->name);
                    }

                    $app->get('/' . $name . $funcName, "App\\Action\\{$filename}:{$func->name}");
                }
            }

        }

    }
}