<?php
spl_autoload_register('autoload_function');
function autoload_function($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
}
echo new \Fightmaster\PHPLecture() . \PHP_EOL;
echo new \Fightmaster_PHPLectureUnderscore() . \PHP_EOL;
echo new \Fightmaster\underscore_directory\PHPLecture() . \PHP_EOL;
echo new \Fightmaster\PHP_Lecture() . \PHP_EOL;