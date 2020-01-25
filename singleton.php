<?php

class Singleton
{
    private static $instances = [];
    public const CNT = 10;

    protected function __construct() { }

    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance($i): Singleton
    {
        $obj = null;
        if ($i < self::CNT)
        {
            self::$instances[$i] = new self();
            $obj =  self::$instances[$i];
        } else {
            $obj =  self::$instances[self::CNT-1];  
        }

        return $obj;
    }

}

$s = null;
for($i = 0; $i<15; $i++){
    $s[] = Singleton::getInstance($i);
}
    
var_dump($s);
