<?php


class Autoload
{
    private $dirs = [
        'Connect', 'DB', 'QueryBuilder', 'Record'
    ];
    public function loadClass($className)
    {
        foreach ($this->dirs as $dir){
            $file = dirname(__DIR__) . '/' . $dir . '/'. $className. '.php';
            if (is_file($file)){
                require $file;
                break;
            }
        }
    }
}
