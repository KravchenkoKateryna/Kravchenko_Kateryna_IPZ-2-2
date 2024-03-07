<?php
function myAutoloader($class) {
    $classPath = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $filePath = __DIR__ . DIRECTORY_SEPARATOR . $classPath . '.php';
    if (file_exists($filePath)) {
        include $filePath;
    }
}

spl_autoload_register('myAutoloader');

