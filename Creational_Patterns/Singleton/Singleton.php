<?php


final class Singleton
{

    private static $instance;
    private int $n;

    private function __construct()
    {
    }

    private function __clone(): void
    {
    }

    private function __wakeup(): void
    {
    }

    public static function getInstance(): Singleton
    {

        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @return int
     */
    public function getN(): int
    {
        return $this->n;
    }

    /**
     * @param int $n
     */
    public function setN(int $n): void
    {
        $this->n = $n;
    }


}

$n1 = Singleton::getInstance();
$n1->setN(777);

$n2 = Singleton::getInstance();
echo $n2->getN();
