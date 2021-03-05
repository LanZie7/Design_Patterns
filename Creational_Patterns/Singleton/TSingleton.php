<!-- 
Задание 1.
Как при помощи трейта улучшить Singleton?
-->

<?php

trait TSingleton
{
    protected static $instance;

    public static function getInstance()
    {
        return isset(static::$instance)
            ? static::$instance
            : static::$instance = new static;
    }
        private function __construct()
        {
            $this->init();
        }

    protected function init() {}
    private function __clone() {}
    private function __wakeup() {}
}

// тестируем трейт в классе, используя его (например, можно исп-ть в DB)

class Test 
{
    use TSingleton;

    protected function init() {
        $this->foo = 1;
        echo "Hi to the Universe!";
    }
}

var_dump(Test::getInstance());