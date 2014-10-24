<?php

namespace APIsSilex\Registry;

class Registry
{
    private static $instance;
    private $storage;

    protected function __construct() {
        $this->storage = new ArrayObject();
    }

    public function get($key) {
        if ($this->storage->offsetExists($key)) {
            return $this->storage->offsetGet($key);
        } else {
            throw new RuntimeException(sprintf("There are no registered value with the index: {$key}!!!"));
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Registry();
        }
        return self::$instance;
    }

    public function set($key, $value) {
        if (!$this->storage->offsetExists($key)) {
            $this->storage->offsetSet($key, $value);
        } else {
            throw new LogicException(sprintf("There are no registered value with the index: {$key}!!!"));
        }
    }

    public function unregister($key) {
        if ($this->storage->offsetExists($key)) {
            $this->storage->offsetUnset($key);
        } else {
            throw new RuntimeException(sprintf("There are no registered value with the index: {$key}!!!"));
        }
    }

}
